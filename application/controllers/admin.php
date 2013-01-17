<?php
class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		redirect('admin/ListAkun');
	}
	function _paginate($model, $url, $offset, $limit)
	{
		$model->get_paged($offset, $limit);
		$this->load->library('pagination');
		$config['base_url'] = site_url().'/'.$url.'/';
		$config['total_rows'] = $model->paged->total_rows;
		$config['per_page'] = $limit; 
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config); 
		return $this->pagination->create_links();
	}
	function ListAkun($offset = 0)
	{
		$model = new Akun();
		//$model->where('approved',0);
		$model->order_by('id','desc');
		$model->include_related('jurusan', array('nama'));
		$model->include_related('fakultas', array('singkat'));
		$data['pagination'] = $this->_paginate($model, 'admin/ListAkun', $offset, 20);
		$data['query'] = $model;
		$data['page']='admin/ListAkun';
		$this->load->view('theme/template', $data);
	}
	function CekAkun($id)
	{
		$model = new Akun();
		$model->get_by_id($id);
		$model->approved = $this->input->post('akun');
		if ($model->skip_validation()->save()) {
			$this->session->set_flashdata('pesan', 'Akun berhasil dimoderasi');
			redirect('admin/ListAkun');
		}
	}
	function ListBuku($offset = 0)
	{
		$model = new Buku();
		$model->order_by('id','desc');
		$data['pagination'] = $this->_paginate($model, 'admin/ListBuku', $offset, 20);
		$data['query'] = $model;
		$data['page']='admin/ListBuku';
		$this->load->view('theme/template', $data);
	}
	function CekBuku($id)
	{
		$data = array('status'=>$this->input->post('buku'));
		$this->db->where('id',$id);
		$this->db->update('buku',$data);
		$this->session->set_flashdata('pesan', 'Buku berhasil dimoderasi');
		redirect('admin/ListBuku');
	}
	function ListKomentar($offset = 0)
	{
		$model = new Komentar();
		$model->order_by('id', 'desc');
		$model->include_related('buku', array('judul'));
		$model->include_related('akun', array('nama'));
		$data['pagination'] = $this->_paginate($model, 'admin/ListKomentar', $offset, 20);
		$data['query'] = $model;
		$data['page']='admin/ListKomentar';
		$this->load->view('theme/template', $data);
	}
	function CekKomentar($id)
	{
		$data = array('status'=>$this->input->post('komentar'));
		$this->db->where('id',$id);
		$this->db->update('komentar',$data);
		$this->session->set_flashdata('pesan', 'Komentar berhasil dimoderasi');
		redirect('admin/ListKomentar');
	}	
	function logs()
	{
	  $this->load->spark('fire_log/0.8.2');
	}
}
?>