<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
$cache = array (
  'table' => 'rating',
  'fields' => 
  array (
    0 => 'id',
    1 => 'akun_id',
    2 => 'buku_id',
    3 => 'rating',
    4 => 'created',
  ),
  'validation' => 
  array (
    'id' => 
    array (
      'field' => 'id',
      'rules' => 
      array (
        0 => 'integer',
      ),
    ),
    'akun_id' => 
    array (
      'field' => 'akun_id',
      'rules' => 
      array (
      ),
    ),
    'buku_id' => 
    array (
      'field' => 'buku_id',
      'rules' => 
      array (
      ),
    ),
    'rating' => 
    array (
      'field' => 'rating',
      'rules' => 
      array (
      ),
    ),
    'created' => 
    array (
      'field' => 'created',
      'rules' => 
      array (
      ),
    ),
    'buku' => 
    array (
      'field' => 'buku',
      'rules' => 
      array (
      ),
    ),
    'akun' => 
    array (
      'field' => 'akun',
      'rules' => 
      array (
      ),
    ),
  ),
  'has_one' => 
  array (
    'buku' => 
    array (
      'class' => 'buku',
      'other_field' => 'rating',
      'join_self_as' => 'rating',
      'join_other_as' => 'buku',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => false,
    ),
    'akun' => 
    array (
      'class' => 'akun',
      'other_field' => 'rating',
      'join_self_as' => 'rating',
      'join_other_as' => 'akun',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => false,
    ),
  ),
  'has_many' => 
  array (
  ),
  '_field_tracking' => 
  array (
    'get_rules' => 
    array (
    ),
    'matches' => 
    array (
    ),
    'intval' => 
    array (
      0 => 'id',
    ),
  ),
);