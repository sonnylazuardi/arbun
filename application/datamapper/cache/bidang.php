<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
$cache = array (
  'table' => 'bidang',
  'fields' => 
  array (
    0 => 'id',
    1 => 'nama',
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
    'nama' => 
    array (
      'field' => 'nama',
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
  ),
  'has_many' => 
  array (
    'buku' => 
    array (
      'class' => 'buku',
      'other_field' => 'bidang',
      'join_self_as' => 'bidang',
      'join_other_as' => 'buku',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => false,
    ),
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