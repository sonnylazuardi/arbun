<?php

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('login_manager', array('autologin' => FALSE));
	}
	function buat_captcha()
	{
		$this->load->helper('captcha');
		$vals = array(
      'font_size'     => 80,      // default: 18
      'img_width'  => '190',  // default: 170
      'img_height' => '60',   // default: 60
			'img_path' => './public/captcha/',
			'font_path' => './system/fonts/texb.ttf',
			'img_url' => base_url().'public/captcha/'
    );
		$db_reset = FALSE;
		if ($this->db->cache_on == TRUE)
		{
			$this->db->cache_off();
			$db_reset = TRUE;
		}
		$cap = create_captcha($vals);
		if ($db_reset == TRUE)
		{
			$this->db->cache_on();			
		}
		$data = array(
		    'captcha_time' => $cap['time'],
		    'ip_address' => $this->input->ip_address(),
		    'word' => $cap['word']
	    );
		$query = $this->db->insert_string('captcha', $data);
		$this->db->query($query);
		$teks = $cap['image'];
		$teks .= form_input('Akun[captcha]', '', 'id="captcha"');
		return $teks;
	}
	public function register()
	{
		if($this->login_manager->get_user())
			redirect('user/account');
		$model = new Akun();
		if(isset($_POST['Akun'])) {
			$model->trans_start();
			$model->from_array($_POST['Akun'], array(
				'nama', 'email', 'password', 'confirm_password', 'nim', 'id_fakultas', 'id_jurusan', 'status', 'jen_kelamin', 'captcha',
			));
			$u = $_POST['Akun'];
			$model->tgl_lahir = $u['thn'].'-'.$u['bln'].'-'.$u['tgl'];
			if ($model->save()) {
				$model->trans_complete();
				redirect('user/login');
			}
		}
		$data['captcha']=$this->buat_captcha();
		$data['page']='auth/register';
		$data['model']=$model;
		$this->load->view('theme/template', $data);
	}
	public function login()
	{
		if($this->login_manager->get_user())
			redirect('user/account');
		$user = new Akun();
		if (isset($_POST['Login'])) {
			$user->from_array($_POST['Login'], array('nim', 'password'));
			$login_redirect = $this->login_manager->process_login($user);
			if ($login_redirect) {
				if ($login_redirect === true) {
					redirect('user/account');
				} else {
					redirect($login_redirect);
				}
			}
		}
		$data['page']='auth/login';
		$data['model']=$user;
		$this->load->view('theme/template', $data);
	}
	function logout()
	{
		$this->login_manager->logout();
		redirect('auth/login');
	}
	public function forgot()
	{
		$data['page']='auth/forgot';
		$this->load->view('theme/template', $data);
	}
}

/* End of file login.php */
/* Location: ./system/application/controllers/login.php */