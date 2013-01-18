<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('login_manager');
	}
	public function create($idbuku = 0)
	{
		$user = $this->login_manager->get_user();
		$buku = new Buku();
		$buku->get_by_id($idbuku);
		if(!$buku->exists())show_error('Buku tidak ditemukan');
		$model = new Lapor();
		$model->get_where(array('buku_id'=>$idbuku, 'akun_id'=>$user->id));
		if($model->exists())show_error('Buku sudah dilaporkan');
		if ($this->input->post('submit'))
		{
			$model = new Lapor();
			$model->buku_id = $idbuku;
			$model->akun_id = $user->id;
			$model->isi = $this->input->post('lapor');
			if($model->save()) {
				$this->session->set_flashdata('pesan', 'Buku berhasil dilaporkan');
				redirect('arsip/view/'.$idbuku);
			}
		}
		$data['model']=$model;
		$data['buku']=$buku;
		$data['page']='arsip/report';
		$this->load->view('theme/template', $data);
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */