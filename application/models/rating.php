<?php
class Rating extends DataMapper {

    var $table = 'rating';

    var $has_one = array('buku', 'akun');
    
    var $has_many = array();

    var $validation = array();

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}

/* End of file akun.php */
/* Location: ./application/models/akun.php */
