<?php
class Akun extends DataMapper {

    var $table = 'akun';

    var $has_one = array();

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
        'nim' => array(
            'rules' => array('required', 'unique', 'numeric'),
        ),
        'tgl_lahir' => array(
            'rules' => array('required', 'date[y-m-d,-]'),
        ),
        'id_fakultas' => array(
            'rules' => array('required', 'numeric'),
        ),
        'id_jurusan' => array(
            'rules' => array('required', 'numeric'),
        ),
        'status' => array(
            'rules' => array('required', 'numeric'),
        ),
        'jen_kelamin' => array(
            'rules' => array('required', 'numeric'),
        ),
        'captcha' =>array(
            'rules' => array('required','valid_captcha'),
        ),
    );

    function __construct($id = NULL)
    {
        parent::__construct($id);
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
        { $this->form_validation->set_message('valid_captcha', "gambar verifikasi tidak sesuai"); return FALSE;
        } else {return TRUE;}
    }
    function login()
    {
        $unim = $this->nim;
        $u = new Akun();
        $u->where('nim', $unim)->get();
        if ($this->password === $u->password) {
            return $u->id;
        } else {
            $this->error_message('login', 'NIM/NIP atau Password salah');
            $this->nim = $unim;
            return FALSE;
        }
    }
}

/* End of file akun.php */
/* Location: ./application/models/akun.php */
