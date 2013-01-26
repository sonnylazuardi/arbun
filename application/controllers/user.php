<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('login_manager');
	}
	public function account()
	{
		$model = $this->login_manager->get_user();
		$data['model'] = $model;
		$data['page']='user/account';
		$this->load->view('theme/template', $data);
	}
	public function editprofil()
	{
		$model = $this->login_manager->get_user();
		$date = DateTime::createFromFormat("Y-m-d", $model->tgl_lahir);
		$model->thn = $date->format("Y");
		$model->bln = $date->format("m");
		$model->tgl = $date->format("d");
		if(isset($_POST['Akun'])) {
			$u = $_POST['Akun'];
			if( ! empty($u['password']))
			{
				$model->from_array($u, array('password', 'confirm_password'));
			}
			$model->from_array($u, array('nama', 'nim', 'email',
			'tgl_lahir', 'angkatan', 'status', 'fakultas_id', 'jurusan_id', 'jen_kelamin'));

			$config['upload_path'] = './public/img/user/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '1200';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';
			$this->load->library('upload', $config);
			if ($_FILES['user_file']['error']!=4) {
				if (!$this->upload->do_upload('user_file'))
				{
					$model->picture = 'error';
				} else {
					$ret = $this->upload->data();
					$this->load->helper('pics');
					resize_pic('./public/img/user/'.$ret['file_name'], 200, 200);
					unlink('./public/img/user/'.$model->picture);
					$model->picture = $ret['file_name'];
				}
			}
			// $model->password_old = $u['password_old'];
			// $model->password_new = $u['password_new'];
			$model->tgl_lahir = $u['thn'].'-'.$u['bln'].'-'.$u['tgl'];
			$model->captcha = 'skip';
			if ($model->save()) {
				$this->session->set_flashdata('pesan', 'Profil Akun berhasil diupdate');
				redirect('user/account');
			} elseif (!$model->error->valid_pic && isset($ret)) {
				unlink('./public/img/user/'.$ret['file_name']);
			}
		}
		$data['page']='user/editprofil';
		$data['model']=$model;
		$this->load->view('theme/template', $data);
	}
	function resize_pic($filename){
		require_once APPPATH.'libraries/phpthumb/ThumbLib.inc.php';
		$thumb = PhpThumbFactory::create('./public/img/user/'.$filename);
		$thumb->adaptiveResize(200, 200);
		$thumb->save('./public/img/user/'.$filename, 'jpg');
	}
	public function arsipku($offset = 0)
	{
		$model = new Buku();
		$user = $this->login_manager->get_user();
		$model->where('akun_id', $user->id);
		$data['pagination'] = $this->_paginate($model, 'user/arsipku', $offset, 20);
		$data['page']='user/arsipku';
		$data['model']=$model;
		$this->load->view('theme/template', $data);
	}
	public function unggah()
	{
		$data['page']='user/unggah';
		$this->load->view('theme/template', $data);
	}
	function _paginate($model, $url, $offset, $limit)
	{
		$model->get_paged($offset, $limit);
		$this->load->library('pagination');
		$config['base_url'] = site_url().'/'.$url.'/';
		$config['total_rows'] = $model->paged->total_rows;
		$config['per_page'] = $limit; 
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config); 
		return $this->pagination->create_links();
	}
	public function selipanku($offset = 0)
	{
		$model = new Bookmark();
		$user = $this->login_manager->get_user();
		$model->include_related('buku', array('judul'));
		$model->order_by('id', 'desc');
		$model->where('akun_id', $user->id);

		$data['pagination'] = $this->_paginate($model, 'user/selipanku', $offset, 20);
		$data['page']='user/selipanku';
		$data['model']=$model;
		$this->load->view('theme/template', $data);
	}
	public function komentarku($offset = 0)
	{
		$model = new Komentar();
		$user = $this->login_manager->get_user();
		$model->include_related('buku', array('judul'));
		$model->order_by('id', 'desc');
		$model->where('akun_id', $user->id);

		$data['pagination'] = $this->_paginate($model, 'user/komentarku', $offset, 20);
		$data['page']='user/komentarku';
		$data['model']=$model;
		$this->load->view('theme/template', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */