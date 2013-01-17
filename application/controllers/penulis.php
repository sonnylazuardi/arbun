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
	public function _add_view_count($model, $id)
	{
		$arr = array();
		if($this->session->userdata('userview'))$arr = $this->session->userdata('userview');
		if (!in_array($id, $arr)) {
			$model->view++;
			$model->skip_validation()->save();
			array_push($arr, $id);
			$this->session->set_userdata('userview', $arr);
		}
	}
	public function view($id = 0)
	{
		$model = new Akun();
		$model->get_by_id($id);
		$this->_add_view_count($model, $id);
		if(!$model->exists())show_error('Profil penulis tidak ditemukan');
		$data['model'] = $model;
		$data['page']='penulis/view';
		$this->load->view('theme/template', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */