<?php
class Award extends DataMapper {

    var $table = 'award';

    var $has_one = array('buku');
    
    var $has_many = array();

    var $validation = array(
       'nama' => array(
            'rules' => array('required'),
        ),
    );

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
