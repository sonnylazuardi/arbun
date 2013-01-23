<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
$cache = array (
  'table' => 'award',
  'fields' => 
  array (
    0 => 'id',
    1 => 'buku_id',
    2 => 'nama',
  ),
  'validation' => 
  array (
    'nama' => 
    array (
      'rules' => 
      array (
        0 => 'required',
      ),
      'field' => 'nama',
    ),
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
    'buku' => 
    array (
      'class' => 'buku',
      'other_field' => 'award',
      'join_self_as' => 'award',
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