<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
$cache = array (
  'table' => 'bookmark',
  'fields' => 
  array (
    0 => 'id',
    1 => 'buku_id',
    2 => 'akun_id',
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
    'buku_id' => 
    array (
      'field' => 'buku_id',
      'rules' => 
      array (
      ),
    ),
    'akun_id' => 
    array (
      'field' => 'akun_id',
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
      'other_field' => 'bookmark',
      'join_self_as' => 'bookmark',
      'join_other_as' => 'buku',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => false,
    ),
    'akun' => 
    array (
      'class' => 'akun',
      'other_field' => 'bookmark',
      'join_self_as' => 'bookmark',
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