<?php
class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->load->view('admin/index');
	}
	
	function ListAkun()
	{
		$model = new Akun();
		$model->where('approved',0);
		//$this->db->where('approved',0);
		//$query = $this->db->get('akun');
		$data['query'] = $model->get();
		$this->load->view('admin/ListAkun',$data);
	}
	
	function CekAkun($id)
	{
		$model = new Akun();
		$model->get_by_id($id);
		$model->trans_start();
		$model->approved = 1;
		if ($model->skip_validation()->save()) {
			$model->trans_complete();
			redirect('admin/ListAkun');
		} else {
			echo $model->error->string;
		}
		// $data = array('approved'=>1);
		// $this->db->where('id',$id);
		// $this->db->update('akun',$data);
		// redirect('admin/ListAkun');
	}
	
	function ListBuku()
	{
		$model = new Buku();
		$model->where('status', 0);
		// $this->db->where('status',0);
		//$query = $this->db->get('buku');
		$data['query'] = $model->get();
		$this->load->view('admin/ListBuku',$data);
	}	
	
	function CekBuku($id)
	{
		$data = array('status'=>1);
		$this->db->where('id',$id);
		$this->db->update('buku',$data);
		redirect('admin/ListBuku');
	}
	
	function ListKomentar()
	{
		$this->db->where('status',0);
		$query = $this->db->get('komentar');
		$data['query'] = $query->result();
		$this->load->view('admin/ListKomentar',$data);
	}

	function CekKomentar($id)
	{
		$data = array('status'=>1);
		$this->db->where('id',$id);
		$this->db->update('komentar',$data);
		redirect('admin/ListKomentar');
	}	
	function logs(){
	  $this->load->spark('fire_log/0.8.2');
	}
}
?>