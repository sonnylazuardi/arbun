<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
$cache = array (
  'table' => 'komentar',
  'fields' => 
  array (
    0 => 'id',
    1 => 'akun_id',
    2 => 'buku_id',
    3 => 'status',
    4 => 'isi',
    5 => 'created',
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
    'status' => 
    array (
      'field' => 'status',
      'rules' => 
      array (
      ),
    ),
    'isi' => 
    array (
      'field' => 'isi',
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
      'other_field' => 'komentar',
      'join_self_as' => 'komentar',
      'join_other_as' => 'buku',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => false,
    ),
    'akun' => 
    array (
      'class' => 'akun',
      'other_field' => 'komentar',
      'join_self_as' => 'komentar',
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