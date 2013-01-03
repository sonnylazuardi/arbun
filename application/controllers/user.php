<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function login()
	{
		$data['page']='user/login';
		$this->load->view('theme/template', $data);
	}
	public function auth()
	{
		redirect('user/account');
	}
	public function register()
	{
		$data['page']='user/register';
		$this->load->view('theme/template', $data);
	}
	public function account()
	{
		$data['page']='user/account';
		$this->load->view('theme/template', $data);
	}
	public function editprofil()
	{
		$data['page']='user/editprofil';
		$this->load->view('theme/template', $data);
	}
	public function arsipku()
	{
		$data['page']='user/arsipku';
		$this->load->view('theme/template', $data);
	}
	public function forgot()
	{
		$data['page']='user/forgot';
		$this->load->view('theme/template', $data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */