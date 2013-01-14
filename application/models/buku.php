<?php
class Buku extends DataMapper {

    var $table = 'buku';
    var $default_order_by = array('id'=>'desc');
    var $has_one = array('akun');

    var $has_many = array('kategori', 'bidang', 'matkul', 'rating');

    var $controller;

    var $validation = array(
    	'judul' => array(
        'rules' => array('required', 'trim', 'min_length'=>3,'max_length' => 150),
      ),
      'abstrak' => array(
        'rules' => array('required'),
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
      'link' => array(
        'rules' => array('valid_link'),
      ),
    );

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
    function get_array_bidang()
    {
      $this->bidang->get_iterated();
      $arr = array();
      foreach ($this->bidang as $data) {
        $arr[] = $data->id;
      }
      return $arr;
    }
    function get_kategoriku()
    {
      $arr = array();
        $this->kategori->get_iterated();
        foreach ($this->kategori as $data) {
            $arr[] = anchor('arsip/index?_kategori='.$data->id, $data->nama);
        }
        return implode(', ', $arr);
    }
    function get_matkulku()
    {
        $arr = array();
        $this->matkul->get_iterated();
        foreach ($this->matkul as $data) {
            $arr[] = anchor('arsip/index?_matkul='.$data->id, $data->nama);
        }
        return implode(', ', $arr);
    }
    function get_bidangku()
    {
        $arr = array();
        $this->bidang->get_iterated();
        foreach ($this->bidang as $data) {
            $arr[] = anchor('arsip/index?_bidang='.$data->id, $data->nama);
        }
        return implode(', ', $arr);
    }
    function _valid_link($field)
    {
        if($this->{$field}=='error') {
            $this->error_message('valid_link', 'File Unggahan belum sesuai spesifikasi');
        }
    }
}

/* End of file akun.php */
/* Location: ./application/models/akun.php */
