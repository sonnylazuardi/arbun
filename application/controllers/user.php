<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('login_manager');
	}
	public function account()
	{
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
			$model->trans_start();
			$u = $_POST['Akun'];
			$model->from_array($u);

			$config['upload_path'] = './public/img/user/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '200';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';
			$this->load->library('upload', $config);
			if (isset($_FILES['user_file']) and $_FILES['user_file']['error']!=4) {
				if (!$this->upload->do_upload('user_file'))
				{
					$model->picture = 'error';
				} else {
					$ret = $this->upload->data();
					$this->resize_pic($ret['file_name']);
					unlink('./public/img/user/'.$model->picture);
					$model->picture = $ret['file_name'];
				}
			}
			$model->password_old = $u['password_old'];
			$model->password_new = $u['password_new'];
			$model->tgl_lahir = $u['thn'].'-'.$u['bln'].'-'.$u['tgl'];

			if ($model->save()) {
				$model->trans_complete();
				redirect('user/account');
			} elseif (!$model->error->valid_pic && isset($ret)) {
				unlink('./public/img/user/'.$ret['file_name']);
			}
		}
		$data['page']='user/editprofil';
		$data['model']=$model;
		$this->load->view('theme/template', $data);
	}
	public function arsipku()
	{
		$model = new Buku();
		$user = $this->login_manager->get_user();
		$model->where('akun_id', $user->id)->get();

		$data['page']='user/arsipku';
		$data['model']=$model;
		$this->load->view('theme/template', $data);
	}
	public function unggah()
	{
		$data['page']='user/unggah';
		$this->load->view('theme/template', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */