<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Arsip extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('login_manager', array('autologin' => FALSE));
	}
	public function index($offset = 0)
	{
		$model = new Buku();
		$model->_include_rating_count();
		$model->_include_komentar_count();
		$model->_include_akun();
		$model->select('*');
		foreach (array('urut', 'q', 'kategori', 'matkul', 'bidang') as $item)
			$v[$item] = isset($_GET['_'.$item])?$_GET['_'.$item]:'';
		if (!empty($v['urut'])) {
			if (in_array($v['urut'], array('view', 'created', 'tgl_terbit', 'komentar_count', 'rating_count'))) $d = 'DESC'; else $d = 'ASC';
			$model->order_by($v['urut'], $d);
		} else $v['urut'] = 'created';
		if (!empty($v['q'])) {
			$model->search($v['q']);
		}
		foreach (array('kategori', 'matkul', 'bidang') as $rel) {
			if (!empty($v[$rel])) {
				$model->where_related($rel, 'id', $v[$rel]);
			}
		}
		
		$model->get_paged_iterated($offset, 20);
		$count = $model->paged->total_rows;
		$limit = $model->paged->page_size;
		$this->load->library('pagination');
		$config['base_url'] = site_url().'/arsip/index/';
		$config['total_rows'] = $count;
		$config['per_page'] = $limit; 
		$config['suffix'] = '?'.http_build_query($_GET, '', "&");
		$config['first_url'] = $config['base_url'].$config['suffix'];
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config); 
		$data['pagination'] = $this->pagination->create_links();

		$data['model']=$model;
		$data['v']=$v;
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
		$model->_include_rating_counts();
		$model->select('*');
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
		$datas = explode(', ', $u[$tipe.'ku']);
		$hasil = array();
		if(!empty($u[$tipe.'ku'])) {
			foreach ($datas as $data) {
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
					$model->link = base_url().'public/pdf/'.$ret['file_name'];
				}
			} elseif(!empty($model->upload_url)) $model->link = site_url().'/proxy/index?url='.$model->upload_url;

			if ($model->save($rel)) {
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
		//log_message('error', print_r($model->kategori->all, true));
		$model->kategoriku = $model->get_kategoriku();
		$model->matkulku = $model->get_matkulku();
		$model->bidangku = $model->get_bidangku();
		if(!$model->exists())show_error('Tidak ditemukan Buku yang dicari');
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
		$model->delete();
		redirect('user/arsipku');
	}
	public function download($id = 0)
	{
		$model = new Buku();
		$model->get_by_id($id);
		if(!$model->exists())show_error('Tidak ditemukan Buku yang dicari');
		$this->load->helper('download');
		$this->load->helper('file');
		$data = file_get_contents($model->link); // Read the file's contents
		$name = $model->judul.'.pdf';

		force_download($name, $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */