<?php
class Jurusan extends DataMapper {

    var $table = 'jurusan';

    var $has_one = array();
    
    var $has_many = array('akun');

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
}

/* End of file akun.php */
/* Location: ./application/models/akun.php */
