<?php
class Akun extends DataMapper {

    var $table = 'akun';

    var $has_one = array();

    var $has_many = array();

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
    );

    function __construct($id = NULL)
    {
        parent::__construct($id);
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
