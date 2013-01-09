<?php
class Akun extends DataMapper {

    var $table = 'akun';

    var $has_one = array('jurusan');

    var $has_many = array();

    var $controller;

    var $validation = array(
        'nama' => array(
            'rules' => array('required', 'trim', 'min_length'=>3,'max_length' => 100),
        ),
        'email' => array(
            'rules' => array('required', 'trim', 'valid_email', 'unique', 'min_length'=>3,'max_length' => 100),
        ),
        'password' => array(
            'rules' => array('required'),
            'type' => 'password',
        ),
        'confirm_password' => array( // accessed via $this->confirm_password
            'rules' => array('matches' => 'password'),
            'type' => 'password',
        ),
        'password_old' => array(
            'rules' => array('valid_old_pass'),
            'type' => 'password',
        ),
        'password_new' => array(
            'type' => 'password',
        ),
        'nim' => array(
            'rules' => array('required', 'unique', 'numeric'),
        ),
        'tgl_lahir' => array(
            'rules' => array('required', 'date[y-m-d,-]'),
        ),
        'fakultas_id' => array(
            'rules' => array('required', 'numeric'),
        ),
        'jurusan_id' => array(
            'rules' => array('required', 'numeric'),
        ),
        'status' => array(
            'rules' => array('required', 'numeric'),
        ),
        'jen_kelamin' => array(
            'rules' => array('required', 'numeric'),
        ),
        'captcha' =>array(
            'rules' => array('valid_captcha'),
        ),
        'picture' => array(
            'rules' => array('valid_pic'),
        ),
        'angkatan' => array(
            'rules' => array('required', 'numeric'),
        ),
    );

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
    function _valid_old_pass($field)
    {
        if($this->{$field}!=$this->password){
            $this->error_message('valid_old_pass', 'Password lama tidak sesuai');
        } else {
            $this->password = $this->password_new;
        }
    }
    function _valid_pic($field)
    {
        if($this->{$field}=='error') {
            $this->error_message('valid_pic', 'File gambar hanya bertipe gif,jpg,png dibawah 500kb');
        }
    }
    function _valid_captcha($field)
    {
        $expiration = time()-7200;
        $this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);
        $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
        $this->controller =& get_instance(); 
        $binds = array($this->{$field}, $this->controller->input->ip_address(), $expiration);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();
        if ($row->count == 0)
        { $this->error_message('valid_captcha', "Gambar verifikasi tidak sesuai");
        } 
    }
    
    function login()
    {
        $nim = $this->nim;
        $this->validate()->get();
        if ($this->exists()) {
            return true;
        } else {
            $this->error_message('login', 'NIM/NIP atau Password salah');
            $this->nim = $nim;
            return FALSE;
        }
    }
}

/* End of file akun.php */
/* Location: ./application/models/akun.php */
