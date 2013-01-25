<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
$cache = array (
  'table' => 'lapor',
  'fields' => 
  array (
  ),
  'validation' => 
  array (
    'isi' => 
    array (
      'rules' => 
      array (
        0 => 'required',
      ),
      'field' => 'isi',
    ),
    'id' => 
    array (
      'field' => 'id',
      'rules' => 
      array (
        0 => 'integer',
      ),
    ),
    'akun' => 
    array (
      'field' => 'akun',
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
  ),
  'has_one' => 
  array (
    'akun' => 
    array (
      'class' => 'akun',
      'other_field' => 'lapor',
      'join_self_as' => 'lapor',
      'join_other_as' => 'akun',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => false,
    ),
    'buku' => 
    array (
      'class' => 'buku',
      'other_field' => 'lapor',
      'join_self_as' => 'lapor',
      'join_other_as' => 'buku',
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