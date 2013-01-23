<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
$cache = array (
  'table' => 'buku',
  'fields' => 
  array (
    0 => 'id',
    1 => 'judul',
    2 => 'akun_id',
    3 => 'jilid',
    4 => 'penerbit',
    5 => 'ISBN',
    6 => 'abstrak',
    7 => 'link',
    8 => 'thumb',
    9 => 'view',
    10 => 'tgl_terbit',
    11 => 'status',
    12 => 'created',
    13 => 'updated',
  ),
  'validation' => 
  array (
    'judul' => 
    array (
      'rules' => 
      array (
        0 => 'required',
        1 => 'trim',
        'min_length' => 3,
        'max_length' => 150,
      ),
      'field' => 'judul',
    ),
    'abstrak' => 
    array (
      'rules' => 
      array (
        0 => 'required',
      ),
      'field' => 'abstrak',
    ),
    'status' => 
    array (
      'rules' => 
      array (
      ),
      'field' => 'status',
    ),
    'jilid' => 
    array (
      'rules' => 
      array (
      ),
      'field' => 'jilid',
    ),
    'penerbit' => 
    array (
      'rules' => 
      array (
      ),
      'field' => 'penerbit',
    ),
    'isbn' => 
    array (
      'rules' => 
      array (
      ),
      'field' => 'isbn',
    ),
    'link' => 
    array (
      'rules' => 
      array (
        0 => 'valid_link',
      ),
      'field' => 'link',
    ),
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
    'ISBN' => 
    array (
      'field' => 'ISBN',
      'rules' => 
      array (
      ),
    ),
    'thumb' => 
    array (
      'field' => 'thumb',
      'rules' => 
      array (
      ),
    ),
    'view' => 
    array (
      'field' => 'view',
      'rules' => 
      array (
      ),
    ),
    'tgl_terbit' => 
    array (
      'field' => 'tgl_terbit',
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
    'updated' => 
    array (
      'field' => 'updated',
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
    'kategori' => 
    array (
      'field' => 'kategori',
      'rules' => 
      array (
      ),
    ),
    'bidang' => 
    array (
      'field' => 'bidang',
      'rules' => 
      array (
      ),
    ),
    'matkul' => 
    array (
      'field' => 'matkul',
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
    'komentar' => 
    array (
      'field' => 'komentar',
      'rules' => 
      array (
      ),
    ),
    'award' => 
    array (
      'field' => 'award',
      'rules' => 
      array (
      ),
    ),
    'bookmark' => 
    array (
      'field' => 'bookmark',
      'rules' => 
      array (
      ),
    ),
    'lapor' => 
    array (
      'field' => 'lapor',
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
      'other_field' => 'buku',
      'join_self_as' => 'buku',
      'join_other_as' => 'akun',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => false,
    ),
  ),
  'has_many' => 
  array (
    'kategori' => 
    array (
      'class' => 'kategori',
      'other_field' => 'buku',
      'join_self_as' => 'buku',
      'join_other_as' => 'kategori',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => false,
    ),
    'bidang' => 
    array (
      'class' => 'bidang',
      'other_field' => 'buku',
      'join_self_as' => 'buku',
      'join_other_as' => 'bidang',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => false,
    ),
    'matkul' => 
    array (
      'class' => 'matkul',
      'other_field' => 'buku',
      'join_self_as' => 'buku',
      'join_other_as' => 'matkul',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => false,
    ),
    'rating' => 
    array (
      'class' => 'rating',
      'other_field' => 'buku',
      'join_self_as' => 'buku',
      'join_other_as' => 'rating',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => false,
    ),
    'komentar' => 
    array (
      'class' => 'komentar',
      'other_field' => 'buku',
      'join_self_as' => 'buku',
      'join_other_as' => 'komentar',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => false,
    ),
    'award' => 
    array (
      'class' => 'award',
      'other_field' => 'buku',
      'join_self_as' => 'buku',
      'join_other_as' => 'award',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => false,
    ),
    'bookmark' => 
    array (
      'class' => 'bookmark',
      'other_field' => 'buku',
      'join_self_as' => 'buku',
      'join_other_as' => 'bookmark',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => false,
    ),
    'lapor' => 
    array (
      'class' => 'lapor',
      'other_field' => 'buku',
      'join_self_as' => 'buku',
      'join_other_as' => 'lapor',
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