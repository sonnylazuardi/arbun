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

		foreach (array('urut', 'q', 'status', 'fakultas_id', 'jurusan_id') as $item)
			$v[$item] = isset($_GET['_'.$item])?$_GET['_'.$item]:'';
		
		if (!empty($v['urut'])) {
			if (in_array($v['urut'], array('buku_count', 'buku_view_count', 'id'))) $d = 'DESC'; else $d = 'ASC';
			$model->order_by($v['urut'], $d);
		}

		if (!empty($v['q'])) {
			$model->ilike('nama', $v['q']);
		}
		if (!empty($v['status'])) {
			$model->where('status', $v['status']-1);
		}
		foreach (array('fakultas_id', 'jurusan_id') as $rel) {
			if (!empty($v[$rel])) {
				$model->where($rel, $v[$rel]);
			}
		}

		$data['pagination'] = $this->_paginate($model, 'penulis/index', $offset, 20);
		$data['model']=$model;
		$data['v']=$v;
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