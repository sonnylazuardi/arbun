<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penulis extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('login_manager', array('autologin' => FALSE));
	}
	public function index($offset = 0)
	{
		$data['page']='penulis/index';
		$model = new Akun();
		$data['count']=$model->count();
		$data['limit']=20;
		$data['offset']=$offset;
		$data['model']=$model;
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */