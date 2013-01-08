<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proxy extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('login_manager');
	}
	public function index()
	{
		if (!isset($_GET['url'])) die();
		$url = urldecode($_GET['url']);
		$url = 'http://' . str_replace('http://', '', $url); // Avoid accessing the file system
		echo file_get_contents($url);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */