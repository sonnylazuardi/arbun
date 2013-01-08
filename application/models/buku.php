<?php
class Buku extends DataMapper {

    var $table = 'buku';

    var $has_one = array();

    var $has_many = array();

    var $controller;

    var $validation = array();

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}

/* End of file akun.php */
/* Location: ./application/models/akun.php */
