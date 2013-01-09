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
		if(!$this->login_manager->get_user())
			redirect('auth/login');
		$model = new Buku();
		if(isset($_POST['Buku'])) {
			$model->trans_start();
			$u = $_POST['Buku'];
			$model->from_array($u);
			$model->akun_id=$this->login_manager->get_user()->id;
			if ($model->save()) {
				$model->trans_complete();
				redirect('user/arsipku');
			}
		}
		$data['page']='arsip/create';
		$data['model']=$model;
		$this->load->view('theme/template', $data);
	}
	public function update($id)
	{
		if(!$this->login_manager->get_user())
			redirect('auth/login');
		$model = new Buku();
		$model->get_by_id($id);
		if(!$model->exists())show_error('Tidak ditemukan Buku yang dicari');
		if(isset($_POST['Buku'])) {
			$model->trans_start();
			$u = $_POST['Buku'];
			$model->from_array($u);
			if ($model->save()) {
				$model->trans_complete();
				redirect('user/arsipku');
			}
		}
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
		$model->delete();
		redirect('user/arsipku');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */