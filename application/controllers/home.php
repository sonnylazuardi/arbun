<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$model = new Buku();
		$data['page']='home';
		$data['model']=$model;
		$this->load->view('theme/template', $data);
	}
	public function kontak()
	{
		$data['page']='kontak';
		$this->load->view('theme/template', $data);
	}
	public function adminlogin()
	{
		$model = new Akun();
		if (isset($_POST['Login'])) {
			$model->from_array($_POST['Login'], array('nim', 'password'));
			if($model->nim=='arbun' && $model->password=='arbunituikan'){
				$this->session->set_userdata('admin', true);
				redirect('admin/index');
			}
		}
		$data['model'] = $model;
		$data['page']='login';
		$this->load->view('theme/template', $data);
	}
	public function adminlogout()
	{
		$this->session->unset_userdata('admin');
		redirect('home/index');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */