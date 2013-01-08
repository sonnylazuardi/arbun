<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('login_manager');
	}
	public function account()
	{
		$data['page']='user/account';
		$this->load->view('theme/template', $data);
	}
	public function editprofil()
	{
		$model = $this->login_manager->get_user();
		$date = DateTime::createFromFormat("Y-m-d", "2068-06-15");
		$model->thn = $date->format("Y");
		$model->bln = $date->format("m");
		$model->tgl = $date->format("d");
		$data['page']='user/editprofil';
		$data['model']=$model;
		$this->load->view('theme/template', $data);
	}
	public function arsipku()
	{
		$data['page']='user/arsipku';
		$this->load->view('theme/template', $data);
	}
	public function unggah()
	{
		$data['page']='user/unggah';
		$this->load->view('theme/template', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */