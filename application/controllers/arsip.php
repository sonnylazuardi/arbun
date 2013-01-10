<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Arsip extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('login_manager', array('autologin' => FALSE));
	}
	public function index()
	{
		$data['page']='arsip/arsip';
		$this->load->view('theme/template', $data);
	}
	public function search()
	{
		$data['page']='search';
		$this->load->view('theme/template', $data);
	}
	public function view()
	{
		$data['page']='arsip/view';
		$this->load->view('theme/template', $data);
	}
	public function create()
	{
		$user = $this->login_manager->get_user();
		if(!$user)
			redirect('auth/login');
		$model = new Buku();
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
		foreach ($datas as $data) {
			$u = $this->_model_tipe($tipe);
			$u->where('nama', $data)->get();
			if(!$u->exists()) {
				$d = $this->_model_tipe($tipe);
				$d->trans_start();
				$d->nama = $data;
				$d->save();
				$d->trans_complete();
				$hasil[] = $d->id;
			} else {
				$hasil[] = $u->id;
			}
		}
		return $hasil;
	}
	public function _save($model, $user)
	{
		if(isset($_POST['Buku'])) {
			$model->trans_start();
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
			if (isset($_FILES['upload_pdf']) and $_FILES['upload_pdf']['error']!=4) {
				if (!$this->upload->do_upload('upload_pdf'))
				{
					$model->link  = 'error';
				} else {
					$ret = $this->upload->data();
					$model->link = base_url().'public/pdf/'.$ret['file_name'];
				}
			} elseif(!empty($model->upload_url)) $model->link = site_url().'/proxy/index?url='.$model->upload_url;

			if ($model->save($rel)) {
				$model->trans_complete();
				redirect('user/arsipku');
			}
		}
	}
	public function update($id)
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
	public function delete($id)
	{
		if(!$this->login_manager->get_user())
			redirect('auth/login');
		$model = new Buku();
		$model->get_by_id($id);
		if(!$model->exists())show_error('Tidak ditemukan Buku yang dicari');
		// $model->trans_start();
		$model->delete();
		// $model->trans_complete();
		redirect('user/arsipku');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */