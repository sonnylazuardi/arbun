<?php
class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('admin')) redirect('home/adminlogin');
	}
	function index()
	{
		redirect('admin/ListAkun');
	}
	function _paginate($model, $url, $offset, $limit)
	{
		$model->get_paged_iterated($offset, $limit);
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
	public function akundelete($id = 0)
	{
		$model = new Akun();
		$model->get_by_id($id);
		if($model->exists()) {
			unlink('./public/img/user/'.basename($model->picture));
			$model->delete();
		}
		redirect('admin/ListAkun');
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
	public function bukudelete($id = 0)
	{
		$model = new Buku();
		$model->get_by_id($id);
		if($model->exists()) {
			if(!empty($model->link)) unlink('./public/pdf/'.basename($model->link));
			if(!empty($model->cover)) unlink('./public/img/cover/'.$model->cover);
			$model->delete();
		}
		redirect('admin/ListBuku');
	}
	function CekBuku($id)
	{
		$data = array('status'=>$this->input->post('buku'));
		$this->db->where('id',$id);
		$this->db->update('buku',$data);
		$this->session->set_flashdata('pesan', 'Buku berhasil dimoderasi');
		redirect('admin/ListBuku');
	}
	function CekLapor($id)
	{
		$data = array('status'=>$this->input->post('buku'));
		$this->db->where('id',$id);
		$this->db->update('buku',$data);
		$this->session->set_flashdata('pesan', 'Buku berhasil dimoderasi');
		redirect('admin/ListLaporan');
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
	public function komentarsdelete($id = 0)
	{
		$model = new Komentar();
		$model->get_by_id($id);
		if($model->exists()) {
			$model->delete();
		}
		redirect('admin/ListKomentar');
	}
	function CekKomentar($id)
	{
		$data = array('status'=>$this->input->post('komentar'));
		$this->db->where('id',$id);
		$this->db->update('komentar',$data);
		$this->session->set_flashdata('pesan', 'Komentar berhasil dimoderasi');
		redirect('admin/ListKomentar');
	}	
	function ListLaporan($offset = 0)
	{
		$model = new Lapor();
		$model->order_by('id', 'desc');
		$model->include_related('buku', array('judul', 'status'));
		$model->include_related('akun', array('nama'));
		$data['pagination'] = $this->_paginate($model, 'admin/ListLaporan', $offset, 20);
		$data['query'] = $model;
		$data['page']='admin/ListLaporan';
		$this->load->view('theme/template', $data);
	}
	public function laporandelete($id = 0)
	{
		$model = new Lapor();
		$model->get_by_id($id);
		if($model->exists()) {
			$model->delete();
		}
		redirect('admin/ListLaporan');
	}
	function ListPenghargaan($offset = 0)
	{
		$model = new Award();
		$model->order_by('id', 'desc');
		$model->include_related('buku', array('judul', 'status'));
		$data['pagination'] = $this->_paginate($model, 'admin/ListPenghargaan', $offset, 20);
		$data['model'] = $model;
		$data['page']='admin/ListPenghargaan';
		$this->load->view('theme/template', $data);
	}
	function TambahAward($idbuku = 0)
	{
		$model = new Award();
		$buku = new Buku();
		$buku->get_by_id($idbuku);
		if(!$buku->exists())show_error('Buku tidak ditemukan');
		if(isset($_POST['data'])) {
			$model->buku_id = $idbuku;
			$model->nama = $_POST['data']['nama'];
			if ($model->save()) {
				$this->session->set_flashdata('pesan', 'Berhasil ditambahkan');
				redirect('admin/ListPenghargaan');
			}
		}
		$data['page']='arsip/award';
		$data['buku']=$buku;
		$data['model']=$model;
		$this->load->view('theme/template', $data);
	}
	public function awardsdelete($id = 0)
	{
		$model = new Award();
		$model->get_by_id($id);
		if($model->exists()) {
				$model->delete();
		}
		redirect('admin/ListPenghargaan');
	}
	function logs()
	{
	  $this->load->spark('fire_log/0.8.2');
	}
}
?>