<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ratings extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('login_manager');
	}
	public function create($idbuku = 0)
	{
		$user = $this->login_manager->get_user();
		$model = new Rating();
		$model->get_where(array('buku_id'=>$idbuku, 'akun_id'=>$user->id));
		if (!$model->exists()) {
			$model = new Rating();
			$model->buku_id = $idbuku;
			$model->akun_id = $user->id;
		}
		$model->rating = $this->input->post('score');
		if ($model->rating == 0) $model->delete(); else $model->save();
		$this->session->set_flashdata('pesan', 'Rating berhasil dilakukan');
		redirect('arsip/view/'.$idbuku);
	}
	public function delete()
	{
		$data['page']='kontak';
		$this->load->view('theme/template', $data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */