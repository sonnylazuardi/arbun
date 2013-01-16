<?php
class Buku extends DataMapper {

    var $table = 'buku';
    var $default_order_by = array('id'=>'desc');
    var $has_one = array('akun');

    var $has_many = array('kategori', 'bidang', 'matkul', 'rating', 'komentar');

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
    function get_kategoriku($link = false)
    {
      $arr = array();
        $this->kategori->get_iterated();
        foreach ($this->kategori as $data) {
          if($link)
            $arr[] = anchor('arsip/index?_kategori='.$data->id, $data->nama);
          else
            $arr[] = $data->nama;
        }
        return implode(', ', $arr);
    }
    function get_matkulku($link = false)
    {
        $arr = array();
        $this->matkul->get_iterated();
        foreach ($this->matkul as $data) {
          if($link)
            $arr[] = anchor('arsip/index?_matkul='.$data->id, $data->nama);
          else
            $arr[] = $data->nama;
        }
        return implode(', ', $arr);
    }
    function get_bidangku($link = false)
    {
        $arr = array();
        $this->bidang->get_iterated();
        foreach ($this->bidang as $data) {
          if($link)
            $arr[] = anchor('arsip/index?_bidang='.$data->id, $data->nama);
          else
            $arr[] = $data->nama;
        }
        return implode(', ', $arr);
    }
    function _valid_link($field)
    {
        if($this->{$field}=='error') {
            $this->error_message('valid_link', 'File Unggahan belum sesuai spesifikasi');
        }
    }
    public function _include_rating_count()
    {
      $ratings = $this->rating;
      $ratings->select_func('AVG', '@rating', 'count');
      $ratings->where_related('buku', 'id', '${parent}.id');
      $this->select_subquery($ratings, 'rating_count');
    }
    public function _include_rating_counts()
    {
      $ratings = $this->rating;
      $ratings->select_func('COUNT', '*', 'count');
      $ratings->where_related('buku', 'id', '${parent}.id');
      $this->select_subquery($ratings, 'rating_counts');
    }
    public function _include_komentar_count()
    {
      $ratings = $this->komentar;
      $ratings->select_func('COUNT', '*', 'count');
      $ratings->where_related('buku', 'id', '${parent}.id');
      $this->select_subquery($ratings, 'komentar_count');
    }
    public function _include_akun()
    {
      $this->include_related('akun', array('nama'));
    }
    public function search($term)
    { 
      // $query = $this->db->query
      // ('SELECT * FROM buku WHERE MATCH (judul) AGAINST ("' . $term . '" IN BOOLEAN MODE)');
      // $this->_process_query($query);
      // "SELECT MATCH('Content') AGAINST ('keyword1 keyword2') as Relevance FROM table WHERE MATCH ('Content') AGAINST('+keyword1 +keyword2' IN BOOLEAN MODE) HAVING Relevance > 0.2 ORDER BY Relevance DESC"
      // $this->select('*');
      $this->where('MATCH(judul, abstrak) AGAINST("' . $term . '" IN BOOLEAN MODE)');
      // $this->order_by('Relevance', 'DESC');
    } 
    public function _my_rating($buku_id, $akun_id)
    {
      $model = new Rating();
      $model->get_where(array('buku_id'=>$buku_id, 'akun_id'=>$akun_id));
      if($model->exists())return $model->rating; else return 0;
    }
}

/* End of file akun.php */
/* Location: ./application/models/akun.php */
