<?php
class Buku extends DataMapper {

    var $table = 'buku';
    var $default_order_by = array('id'=>'desc');
    var $has_one = array('akun');

    var $has_many = array('kategori', 'bidang', 'matkul', 'rating', 'komentar', 'award', 'bookmark', 'lapor');

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
      $komens = $this->komentar;
      $komens->select_func('COUNT', '*', 'count');
      $komens->where('status !=', 0);
      $komens->where_related('buku', 'id', '${parent}.id');
      $this->select_subquery($komens, 'komentar_count');
    }
    public function _include_akun()
    {
      $this->include_related('akun', array('nama'));
    }
    public function get_cover()
    {
      if (file_exists("./public/img/cover/".$this->cover) && !empty($this->cover))
          return base_url().'public/img/cover/'.$this->cover;
      else
          return base_url().'public/img/nocover.jpg';
    }
    public function search($term)
    { 
      // $this->where('MATCH(judul, abstrak) AGAINST("' . $term . '" IN BOOLEAN MODE)');
      $this->ilike('judul', $term);
      $this->or_ilike('abstrak', $term);
    } 
    public function _my_rating($buku_id, $akun_id)
    {
      $model = new Rating();
      $model->get_where(array('buku_id'=>$buku_id, 'akun_id'=>$akun_id));
      if($model->exists())return $model->rating; else return 0;
    }
    public function _include_award_count()
    {
      $award = $this->award;
      $award->select_func('COUNT', '*', 'count');
      $award->where_related('buku', 'id', '${parent}.id');
      $this->select_subquery($award, 'award_count');
    }
    public function _include_bookmark_count()
    {
      $bookmark = $this->bookmark;
      $bookmark->select_func('COUNT', '*', 'count');
      $bookmark->where_related('buku', 'id', '${parent}.id');
      $this->select_subquery($bookmark, 'bookmark_count');
    }
    public function _eksekusi()
    {
      if (!empty($this->_urut) and in_array($this->_urut, array('view', 'created', 'tgl_terbit', 'komentar_count', 'rating_count',))) {
        if (in_array($this->_urut, array('view', 'created', 'tgl_terbit', 'komentar_count', 'rating_count', 'judul', 'akun_nama'))) $d = 'DESC'; else $d = 'ASC';
        $this->order_by($this->_urut, $d);
      } else $this->order_by('id', 'desc');

      if (!empty($this->_q)) {
        $this->search($this->_q);
      }
      
      foreach (array('kategori', 'matkul', 'bidang') as $rel) {
        if (!empty($this->{'_'.$rel})) {
          $this->where_related($rel, 'id', $this->{'_'.$rel});
        }
      }
      if (!empty($this->_akun_nama)) {
        $this->ilike_related_akun('nama', $this->_akun_nama);
      }
      if (!empty($this->_tahun)) {
        $this->where('YEAR(tgl_terbit)', $this->_tahun);
      }
      foreach (array('judul', 'abstrak') as $rel) {
        if (!empty($this->{'_'.$rel})) {
          $this->ilike($rel, $this->{'_'.$rel});
        }
      }
    }
}

/* End of file akun.php */
/* Location: ./application/models/akun.php */
