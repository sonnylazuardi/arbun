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
		$cap = create_captcha($vals);
    $this->session->set_userdata('word', $cap['word']);
		$teks = $cap['image'];
		$teks .= form_input('Akun[captcha]', '', 'id="captcha"');
		return $teks;
	}
	public function register()
	{
		if($this->login_manager->get_user())
			redirect('user/arsipku');
		$model = new Akun();
		if(isset($_POST['Akun'])) {
			$u = $_POST['Akun'];
			$model->from_array($u);
			$model->thn = $u['thn'];
			$model->bln = $u['bln'];
			$model->tgl = $u['tgl'];
			$model->confirm_password = $u['confirm_password'];
			if($this->_valid_captcha())
				$model->captcha = $u['captcha'];
			$config['upload_path'] = './public/img/user/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '1200';
			$this->load->library('upload', $config);
			if ($_FILES['user_file']['error']!=4) {
				if (!$this->upload->do_upload('user_file'))
				{
					$model->picture = 'error';
				} else {
					$ret = $this->upload->data();
					$this->load->helper('pics');
					resize_pic('./public/img/user/'.$ret['file_name'], 200, 200);
					$model->picture = $ret['file_name'];
				}
			}
			$model->tgl_lahir = $u['thn'].'-'.$u['bln'].'-'.$u['tgl'];
			$model->approved = 1;
			if ($model->save()) {
				$this->session->set_flashdata('pesan', 'Registrasi berhasil dilakukan');
				redirect('user/login');
			} elseif (!$model->error->valid_pic && isset($ret)) {
				unlink('./public/img/user/'.$ret['file_name']);
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
			redirect('user/arsipku');
		$user = new Akun();
		if (isset($_POST['Login'])) {
			$user->from_array($_POST['Login'], array('nim', 'password'));
			$user->where('approved', 1);
			$login_redirect = $this->login_manager->process_login($user);
			if($login_redirect) {
				if ($login_redirect == true) {
					redirect('user/arsipku');
				}	else {
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
		if ($this->input->post('email'))
		{
			$model = new Akun();
			$model->where('email', $this->input->post('email'))->get();
			if($model->exists())
			{
				$this->load->library('email');
				$this->email->from('arbun@gmx.com', 'Arbun');
				$this->email->to($model->email); 
				$this->email->subject('Pergantian Password');
				$this->load->helper('password');
				$forget = create_password();
				$model->forget = $forget;
				$model->skip_validation()->save();
				$this->email->message('Klik disini untuk ganti password {unwrap}'.site_url().'/auth/gantipassword/'.$forget.'{/unwrap}');	
				$this->email->send();
				log_message('error', $this->email->print_debugger());
				$this->session->set_flashdata('pesan', 'Email lupa password berhasil dikirim');
				redirect('home/index');
			} else $data['error'] = 'email tersebut tidak terdaftar';
		}
		$data['page']='auth/forgot';
		$this->load->view('theme/template', $data);
	}
	public function gantipassword($cek = 0)
	{
		$model = new Akun();
		$model->where('forget', $cek)->get();
		if(!$model->exists())show_error('Tidak bisa mengganti password');
		if($this->input->post('submit')) {
			$this->load->helper('password');
			$password = create_password();
			$model->password = $password;
			$model->confirm_password = $password;
			$model->captcha = 'skip';
			$model->forget = null;
			$model->save();
			$data['password'] = $password;
		}
		$data['page']='auth/gantipassword';
		$this->load->view('theme/template', $data);
	}
	function _valid_captcha()
  {
    if ($_POST['Akun']['captcha'] != $this->session->userdata('word'))
    {
    	return false;
    } else return true;
  }
}

/* End of file login.php */
/* Location: ./system/application/controllers/login.php */