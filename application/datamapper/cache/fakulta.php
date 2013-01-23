<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
$cache = array (
  'table' => 'fakultas',
  'fields' => 
  array (
    0 => 'id',
    1 => 'singkat',
    2 => 'nama',
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
    'singkat' => 
    array (
      'field' => 'singkat',
      'rules' => 
      array (
      ),
    ),
    'nama' => 
    array (
      'field' => 'nama',
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
  ),
  'has_many' => 
  array (
    'akun' => 
    array (
      'class' => 'akun',
      'other_field' => 'fakulta',
      'join_self_as' => 'fakulta',
      'join_other_as' => 'akun',
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