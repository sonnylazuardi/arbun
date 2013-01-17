<?php

/**
 * Simple utility class to handle logins.
 */
class Login_Manager {
	
	var $logged_in_user = NULL;
	
	function __construct($params = array())
	{
		
		$this->CI =& get_instance(); 
		$this->session =& $this->CI->session;
		if( ! isset($params['autologin']) || $params['autologin'] !== FALSE)
		{
			$this->check_login();
		}
		// print_r($this->session->all_userdata());
	}
	
	function check_login()
	{
		$u = new Akun();
		if($u->count() == 0)
		{
			redirect('auth/register');
		}
		// if not logged in, automatically redirect
		$u = $this->get_user();
		if($u === FALSE)
		{
			$this->session->set_userdata('login_redirect', uri_string());
			redirect('auth/login');
		}
	}
	
	/**
	 * process_login
	 * Validates that a username and password are correct.
	 * 
	 * @param object $user The user containing the login information.
	 * @return FALSE if invalid, TRUE or a redirect string if valid. 
	 */
	function process_login($user)
	{
		// attempt the login
		$success = $user->login();
		if($success)
		{
			// store the userid if the login was successful
			$this->session->set_userdata('logged_in_id', $user->id);
			// store the user for this request
			$this->logged_in_user = $user;
		
			// if a redirect is necessary, return it.
			$redirect = $this->session->userdata('login_redirect');
			if(!empty($redirect))
			{
				$success = $redirect;
			}
		}
		return $success;
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		$this->logged_in_user = NULL;
	}
	
	function get_user()
	{
		if(is_null($this->logged_in_user))
		{
			$id = $this->session->userdata('logged_in_id');
			if(is_numeric($id))
			{
				$u = new Akun();
				$u->include_related('fakultas', array('nama'));
				$u->include_related('jurusan', array('nama'));
				$u->get_by_id($id);
				if($u->exists()) {
					$this->logged_in_user = $u;
					return $this->logged_in_user;
				}
			}
			return FALSE;
		}
		else
		{
			return $this->logged_in_user;
		}
	}
}
