<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bookmarks extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('login_manager');
	}
	public function create($idbuku = 0)
	{
		$user = $this->login_manager->get_user();
		$model = new Bookmark();
		$model->buku_id = $idbuku;
		$model->akun_id = $user->id;
		$model->save();
		redirect('arsip/view/'.$idbuku);
	}
	public function delete($id = 0, $idbuku = 0)
	{
		$user = $this->login_manager->get_user();
		$model = new Bookmark();
		$model->get_by_id($id);
		if($model->exists()) {
			if($model->akun_id == $user->id)
				$model->delete();
		}
		redirect('arsip/view/'.$idbuku);
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */