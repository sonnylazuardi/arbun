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
    log_message('error', print_r($data, true));
		$query = $this->db->insert_string('captcha', $data);
		$ret = $this->db->query($query);
		log_message('error', $ret);
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
			$model->trans_start();
			$u = $_POST['Akun'];
			$model->from_array($u);
			$model->confirm_password = $u['confirm_password'];
			if($this->_valid_captcha())
				$model->captcha = $u['captcha'];

			$config['upload_path'] = './public/img/user/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '500';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';
			
			$this->load->library('upload', $config);
			if ($_FILES['user_file']['error']!=4) {
				if (!$this->upload->do_upload('user_file'))
				{
					$model->picture = 'error';
				} else {
					$ret = $this->upload->data();
					$this->resize_pic($ret['file_name']);
					$model->picture = $ret['file_name'];
				}
			}

			$model->tgl_lahir = $u['thn'].'-'.$u['bln'].'-'.$u['tgl'];
			if ($model->save()) {
				$model->trans_complete();
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
	function resize_pic($filename){
		$config['image_library'] = 'gd2';
		$config['source_image']	= './public/img/user/'.$filename;
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = FALSE;
		$config['width']	 = 120;
		$config['height']	= 120;

		$this->load->library('image_lib', $config); 

		$this->image_lib->resize();
	}
	public function login()
	{
		if($this->login_manager->get_user())
			redirect('user/arsipku');
		$user = new Akun();
		if (isset($_POST['Login'])) {
			$user->from_array($_POST['Login'], array('nim', 'password'));
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
		$data['page']='auth/forgot';
		$this->load->view('theme/template', $data);
	}
	function _valid_captcha()
  {
      $expiration = time()-7200;
      $this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);
      $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
      $binds = array($_POST['Akun']['captcha'], $this->input->ip_address(), $expiration);
      $query = $this->db->query($sql, $binds);
      $row = $query->row();
      if ($row->count == 0)
      {
      	return false;
      } else return true;
  }
}

/* End of file login.php */
/* Location: ./system/application/controllers/login.php */