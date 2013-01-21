<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penulis extends CI_Controller {
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
		$model = new Akun();
		$model->_include_buku_count();
		$model->_include_buku_view_count();
		$model->select('*');
		$model->where('approved !=', 0);
		$model->from_array($this->input->get(), array('_urut', '_q', '_status', '_fakultas_id', '_jurusan_id'));
		$model->_eksekusi();
		

		$data['pagination'] = $this->_paginate($model, 'penulis/index', $offset, 20);
		$data['model']=$model;
		$data['page']='penulis/index';
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
		$model->where('approved !=', 0);
		$model->get_by_id($id);
		if(!$model->exists())show_error('Profil penulis tidak ditemukan');
		$this->_add_view_count($model, $id);
		$data['model'] = $model;
		$data['page']='penulis/view';
		$this->load->view('theme/template', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */