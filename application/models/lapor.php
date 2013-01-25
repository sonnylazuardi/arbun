<?php
class Lapor extends DataMapper {

    var $table = 'lapor';

    var $has_one = array('akun', 'buku');
    
    var $has_many = array();

    var $validation = array(
	   'isi' => array(
            'rules' => array('required'),
        ),
    );

    function __construct()
    {
        parent::__construct();
    }
}

/* End of file lapor.php */
/* Location: ./application/models/lapor.php */
