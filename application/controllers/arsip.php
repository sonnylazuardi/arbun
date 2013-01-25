<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Arsip extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('login_manager', array('autologin' => FALSE));
	}
	function _paginate($model, $url, $offset, $limit)
	{
		$model->get_paged_iterated($offset, $limit);
		$this->load->library('pagination');
		$config['base_url'] = site_url().'/'.$url.'/';
		$config['total_rows'] = $model->paged->total_rows;
		$config['per_page'] = $limit; 
		$config['suffix'] = '?'.http_build_query($_GET, '', "&");
		$config['first_url'] = $config['base_url'].$config['suffix'];
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config); 
		return $this->pagination->create_links();
	}
	public function index($offset = 0)
	{
		$model = new Buku();
		$model->_include_rating_count();
		$model->_include_komentar_count();
		$model->_include_akun();
		$model->select('*');
		$model->where('status !=', 0);
		$model->from_array($this->input->get(), array('_urut', '_q', '_kategori', '_matkul', '_bidang', '_akun_nama', '_judul', '_tahun', '_abstrak'));
		$model->_eksekusi();

		$data['pagination'] = $this->_paginate($model, 'arsip/index', $offset, 20);

		$data['model']=$model;
		$data['page']='arsip/index';
		$this->load->view('theme/template', $data);
	}
	public function search()
	{
		$data['page']='search';
		$this->load->view('theme/template', $data);
	}
	public function _add_view_count($model, $id)
	{
		$arr = array();
		if($this->session->userdata('pageview'))$arr = $this->session->userdata('pageview');
		if (!in_array($id, $arr)) {
			$model->view++;
			$model->skip_validation()->save();
			array_push($arr, $id);
			$this->session->set_userdata('pageview', $arr);
		}
	}
	public function view($id = 0)
	{
		$model = new Buku();
		$model->_include_rating_count();
		$model->_include_komentar_count();
		$model->_include_rating_counts();
		$model->include_related('akun', array('nama'));
		$model->select('*');
		$model->where('status !=', 0);
		$user = $this->login_manager->get_user();
		if (!$user) $model->where('status', 1);
		$model->get_by_id($id);
		if(!$model->exists())show_error('Buku Tidak ditemukan');
		$this->_add_view_count($model, $id);
		if(!$model->exists())show_error('Buku tidak ditemukan');
		$data['model'] = $model;
		$data['page']='arsip/view';
		$this->load->view('theme/template', $data);
	}
	public function create()
	{
		$user = $this->login_manager->get_user();
		if(!$user)
			redirect('auth/login');
		$model = new Buku();
		$model->view = 0;
		$model->status = 1;
		$model->tgl_terbit = date('Y-m-d');
		$this->_save($model, $user);
		$data['page']='arsip/create';
		$data['model']=$model;
		$this->load->view('theme/template', $data);
	}
	public function _model_tipe($tipe)
	{
		switch ($tipe) {
				case 'kategori': return new Kategori(); break;
				case 'matkul': return new Matkul(); break;
				case 'bidang': return new Bidang(); break;
			}
	}
	public function _save_rel($tipe)
	{
		$u = $_POST['Buku'];
		$datas = explode(',', $u[$tipe.'ku']);
		$hasil = array();
		if(!empty($u[$tipe.'ku'])) {
			foreach ($datas as $data) {
				$data = trim($data);
				if (!empty($data)) {
					$u = $this->_model_tipe($tipe);
					$u->where('nama', $data)->get();
					if(!$u->exists()) {
						$d = $this->_model_tipe($tipe);
						$d->nama = $data;
						$d->skip_validation()->save();
						$hasil[] = $d->id;
					} else {
						$hasil[] = $u->id;
					}
				}
			}
		}
		return $hasil;
	}
	public function _save($model, $user)
	{
		if(isset($_POST['Buku'])) {
			$u = $_POST['Buku'];
			$u['kategori'] = $this->_save_rel('kategori');
			$u['matkul'] = $this->_save_rel('matkul');
			$u['bidang'] = $this->_save_rel('bidang');
			$rel = $model->from_array($u, array(
				'judul', 'abstrak', 'kategori', 'matkul', 'bidang', 'status', 'jilid',
				'penerbit', 'isbn', 'tgl_terbit', 'upload_url'
			));
			$rel['akun'] = $user;

			$config['upload_path'] = './public/img/cover/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '1000';
			$this->load->library('upload', $config);
			if ($_FILES['upload_cover']['error']!=4) {
				if ($this->upload->do_upload('upload_cover')) {
					$ret = $this->upload->data();
					if(!empty($model->cover))
						unlink('./public/img/cover/'.$model->cover);
					$this->load->helper('pics');
					resize_pic('./public/img/cover/'.$ret['file_name'], 200, 256);
					$model->cover = $ret['file_name'];
				}
			}

			$config['upload_path'] = './public/pdf/';
			$config['allowed_types'] = 'pdf';
			$config['max_size']	= '5000';
			$this->load->library('upload', $config);
			if ($_FILES['upload_pdf']['error']!=4) {
				if (!$this->upload->do_upload('upload_pdf'))
				{
					$model->link  = 'error';
				} else {
					$ret = $this->upload->data();
					if(!empty($model->link))
						unlink('./public/pdf/'.basename($model->link));
					$model->link = base_url().'public/pdf/'.$ret['file_name'];
				}
			} elseif(!empty($model->upload_url)) $model->link = $model->upload_url;

			if ($model->save($rel)) {
				$this->session->set_flashdata('pesan', 'Arsip berhasil disimpan');
				redirect('user/arsipku');
			}
		}
	}
	public function update($id = 0)
	{
		$user = $this->login_manager->get_user();
		if(!$user)
			redirect('auth/login');
		$model = new Buku();
		$model->get_by_id($id);
		if(!$model->exists())show_error('Tidak ditemukan Buku yang dicari');
		//log_message('error', print_r($model->kategori->all, true));
		$model->kategoriku = $model->get_kategoriku();
		$model->matkulku = $model->get_matkulku();
		$model->bidangku = $model->get_bidangku();
		if(!empty($model->link))$model->upload_url = $model->link;
		$this->_save($model, $user);
		$data['page']='arsip/update';
		$data['model']=$model;
		$this->load->view('theme/template', $data);
	}
	public function delete($id = 0)
	{
		if(!$this->login_manager->get_user())
			redirect('auth/login');
		$model = new Buku();
		$model->get_by_id($id);
		if(!$model->exists())show_error('Tidak ditemukan Buku yang dicari');
		unlink('./public/pdf/'.basename($model->link));
		$model->delete();
		$this->session->set_flashdata('pesan', 'Arsip berhasil dihapus');
		redirect('user/arsipku');
	}
	public function download($id = 0)
	{
		$model = new Buku();
		$model->get_by_id($id);
		if(!$model->exists())show_error('Tidak ditemukan Buku yang dicari');
		redirect($model->link);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */