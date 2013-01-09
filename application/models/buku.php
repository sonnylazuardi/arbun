<?php
class Buku extends DataMapper {

    var $table = 'buku';

    var $has_one = array();

    var $has_many = array();

    var $controller;

    var $validation = array(
    	'judul' => array(
        'rules' => array('required', 'trim', 'min_length'=>3,'max_length' => 100),
      ),
      'abstrak' => array(
        'rules' => array('required'),
      ),
      'bidang' => array(
        'rules' => array(),
      ),
      'status' => array(
        'rules' => array(),
      ),
      'jilid' => array(
        'rules' => array(),
      ),
      'penerbit' => array(
        'rules' => array(),
      ),
      'isbn' => array(
        'rules' => array(),
      ),
    );

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}

/* End of file akun.php */
/* Location: ./application/models/akun.php */
