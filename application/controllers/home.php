<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$data['page']='home';
		$this->load->view('theme/template', $data);
	}
	public function kontak()
	{
		$data['page']='kontak';
		$this->load->view('theme/template', $data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */