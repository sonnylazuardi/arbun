<?php
class Kategori extends DataMapper {

    var $table = 'kategori';

    var $has_one = array();
    
    var $has_many = array('buku');

    var $validation = array();

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
    function getArray()
    {
        $ret = $this->get();
        $items = array();
        foreach ($ret as $item) {
            $items[$item->id] = $item->nama;
        }
        return $items;
    }
    function getLinks()
    {
        $ret = $this->get();
        $items = array();
        foreach ($ret as $item) {
            $items[] = anchor('arsip/index?_kategori='.$item->id, $item->nama);
        }
        return implode(', ', $items);
    }
}

/* End of file akun.php */
/* Location: ./application/models/akun.php */
