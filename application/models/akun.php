<?php
class Akun extends DataMapper {

    var $table = 'akun';

    var $has_one = array('fakultas', 'jurusan');

    var $has_many = array('buku', 'komentar', 'bookmark', 'lapor');

    var $controller;

    var $validation = array(
        'nama' => array(
            'rules' => array('required', 'trim', 'min_length'=>3,'max_length' => 100),
        ),
        'email' => array(
            'rules' => array('required', 'trim', 'check_email', 'valid_email', 'unique', 'min_length'=>3,'max_length' => 100),
        ),
        'password' => array(
            'rules' => array('required', 'trim', 'min_length' => 3, 'max_length' => 40, 'encrypt'),
            'type' => 'password',
        ),
        'confirm_password' => array( // accessed via $this->confirm_password
            'rules' => array('required', 'encrypt', 'matches' => 'password', 'min_length' => 3, 'max_length' => 40),
            'type' => 'password',
        ),
        /*'password_old' => array(
            'rules' => array('valid_old_pass'),
            'type' => 'password',
        ),
        'password_new' => array(
            'rules' => array('min_length' => 3, 'max_length' => 40),
            'type' => 'password',
        ),*/
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
            'rules' => array('required'),
        ),
        'picture' => array(
            'rules' => array('valid_pic'),
        ),
        'angkatan' => array(
            'rules' => array('required', 'numeric'),
        ),
        'approved' => array(
            'rules' => array('numeric'),
        ),
    );

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
    /*function _valid_old_pass($field)
    {
        if($this->_encrypt($field)!=$this->password){
            $this->error_message('valid_old_pass', 'Password lama tidak sesuai');
        } else {
            $this->password = $this->_encrypt('password_new');
        }
    }*/
    function _valid_pic($field)
    {
        if($this->{$field}=='error') {
            $this->error_message('valid_pic', 'File gambar hanya bertipe gif,jpg,png dibawah 500kb');
        }
    }
    function _check_email($field)
    {
        $allowed = array('std.stei.itb.ac.id', 's.itb.ac.id', 'students.itb.ac.id');
        $domain = array_pop(explode('@', $this->{$field}));
        if ( ! in_array($domain, $allowed))
        {
            // Not allowed
            $this->error_message('check_email', 'Email harus merupakan email dari ITB '.implode(', ', $allowed));
        }
    }
    
    function login()
    {
        $unim = $this->nim;
        $u = new Akun();
        $u->where('nim', $unim)->get();
        $this->salt = $u->salt;
        $this->validate()->get();
        if ($this->exists()) {
            return true;
        } else {
            $this->error_message('login', 'NIM/NIP atau Password salah');
            $this->nim = $unim;
            return FALSE;
        }
    }

    function get_profpic()
    {
        if (file_exists("./public/img/user/".$this->picture) && !empty($this->picture))
            return base_url().'public/img/user/'.$this->picture;
        else
            return base_url().'public/img/noimg.png';
    }
    function tulis_profile()
    {
        echo '<img src="'.$this->get_profpic().'" width="50px"/><br>'.anchor('penulis/view/'.$this->id, $this->nama);
    }

    function _encrypt($field)
    {
        if (!empty($this->{$field}))
        {
            if (empty($this->salt))
            {
                $this->salt = md5(uniqid(rand(), true));
            }
            $this->{$field} = sha1($this->salt . $this->{$field});
        }
        // return $this->{$field};
    }
    public function _count_award()
    {
      $this->buku->_include_award_count();
      $this->buku->get_iterated();
      $sum = 0;
      foreach ($this->buku as $data) {
        $sum += $data->award_count;
      }
      return $sum;
    }
    public function _count_bookmark()
    {
      $this->buku->_include_bookmark_count();
      $this->buku->get_iterated();
      $sum = 0;
      foreach ($this->buku as $data) {
        $sum += $data->bookmark_count;
      }
      return $sum;
    }
    public function _newest_award()
    {
      $this->buku->include_related('award', array('nama'));
      $this->buku->order_by('id', 'desc');
      return $this->buku->get()->award_nama;
    }
    public function _include_buku_count()
    {
      $buku = $this->buku;
      $buku->select_func('COUNT', '*', 'count');
      $buku->where_related('akun', 'id', '${parent}.id');
      $this->select_subquery($buku, 'buku_count');
    }
    public function _include_buku_view_count()
    {
      $award = $this->buku;
      $award->select_func('SUM', '@view', 'count');
      $award->where_related('akun', 'id', '${parent}.id');
      $this->select_subquery($award, 'buku_view_count');
    }
    public function _eksekusi()
    {
      if (!empty($this->_urut) and in_array($this->_urut, array('id', 'buku_view_count', 'nama', 'buku_count'))) {
        if (in_array($this->_urut, array('buku_count', 'buku_view_count', 'id'))) $d = 'DESC'; else $d = 'ASC';
        $this->order_by($this->_urut, $d);
      } else $this->order_by('id', 'desc');
      if (!empty($this->_q)) {
        $this->ilike('nama', $this->_q);
      }
      if (!empty($this->_status)) {
        $this->where('status', $this->_status-1);
      }
      foreach (array('fakultas_id', 'jurusan_id') as $rel) {
        if (!empty($this->{'_'.$rel})) {
            $this->where($rel, $this->{'_'.$rel});
        }
      }
    }
}

/* End of file akun.php */
/* Location: ./application/models/akun.php */
