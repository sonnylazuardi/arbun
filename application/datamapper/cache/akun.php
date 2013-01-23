<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
$cache = array (
  'table' => 'akun',
  'fields' => 
  array (
    0 => 'id',
    1 => 'nama',
    2 => 'email',
    3 => 'password',
    4 => 'salt',
    5 => 'nim',
    6 => 'tgl_lahir',
    7 => 'fakultas_id',
    8 => 'jurusan_id',
    9 => 'status',
    10 => 'jen_kelamin',
    11 => 'angkatan',
    12 => 'picture',
    13 => 'approved',
    14 => 'forget',
    15 => 'view',
  ),
  'validation' => 
  array (
    'nama' => 
    array (
      'rules' => 
      array (
        0 => 'required',
        1 => 'trim',
        'min_length' => 3,
        'max_length' => 100,
      ),
      'field' => 'nama',
    ),
    'email' => 
    array (
      'rules' => 
      array (
        0 => 'required',
        1 => 'trim',
        2 => 'check_email',
        3 => 'valid_email',
        4 => 'unique',
        'min_length' => 3,
        'max_length' => 100,
      ),
      'field' => 'email',
    ),
    'password' => 
    array (
      'rules' => 
      array (
        0 => 'required',
        1 => 'trim',
        'min_length' => 3,
        'max_length' => 40,
        2 => 'encrypt',
      ),
      'type' => 'password',
      'field' => 'password',
    ),
    'confirm_password' => 
    array (
      'rules' => 
      array (
        0 => 'required',
        1 => 'encrypt',
        'matches' => 'password',
        'min_length' => 3,
        'max_length' => 40,
      ),
      'type' => 'password',
      'field' => 'confirm_password',
    ),
    'nim' => 
    array (
      'rules' => 
      array (
        0 => 'required',
        1 => 'unique',
        2 => 'numeric',
      ),
      'field' => 'nim',
    ),
    'tgl_lahir' => 
    array (
      'rules' => 
      array (
        0 => 'required',
        1 => 'date[y-m-d,-]',
      ),
      'field' => 'tgl_lahir',
    ),
    'fakultas_id' => 
    array (
      'rules' => 
      array (
        0 => 'required',
        1 => 'numeric',
      ),
      'field' => 'fakultas_id',
    ),
    'jurusan_id' => 
    array (
      'rules' => 
      array (
        0 => 'required',
        1 => 'numeric',
      ),
      'field' => 'jurusan_id',
    ),
    'status' => 
    array (
      'rules' => 
      array (
        0 => 'required',
        1 => 'numeric',
      ),
      'field' => 'status',
    ),
    'jen_kelamin' => 
    array (
      'rules' => 
      array (
        0 => 'required',
        1 => 'numeric',
      ),
      'field' => 'jen_kelamin',
    ),
    'captcha' => 
    array (
      'rules' => 
      array (
        0 => 'required',
      ),
      'field' => 'captcha',
    ),
    'picture' => 
    array (
      'rules' => 
      array (
        0 => 'valid_pic',
      ),
      'field' => 'picture',
    ),
    'angkatan' => 
    array (
      'rules' => 
      array (
        0 => 'required',
        1 => 'numeric',
      ),
      'field' => 'angkatan',
    ),
    'approved' => 
    array (
      'rules' => 
      array (
        0 => 'numeric',
      ),
      'field' => 'approved',
    ),
    'id' => 
    array (
      'field' => 'id',
      'rules' => 
      array (
        0 => 'integer',
      ),
    ),
    'salt' => 
    array (
      'field' => 'salt',
      'rules' => 
      array (
      ),
    ),
    'forget' => 
    array (
      'field' => 'forget',
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
    'fakultas' => 
    array (
      'field' => 'fakultas',
      'rules' => 
      array (
      ),
    ),
    'jurusan' => 
    array (
      'field' => 'jurusan',
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
    'komentar' => 
    array (
      'field' => 'komentar',
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
    'fakultas' => 
    array (
      'class' => 'fakultas',
      'other_field' => 'akun',
      'join_self_as' => 'akun',
      'join_other_as' => 'fakultas',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => false,
    ),
    'jurusan' => 
    array (
      'class' => 'jurusan',
      'other_field' => 'akun',
      'join_self_as' => 'akun',
      'join_other_as' => 'jurusan',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => false,
    ),
  ),
  'has_many' => 
  array (
    'buku' => 
    array (
      'class' => 'buku',
      'other_field' => 'akun',
      'join_self_as' => 'akun',
      'join_other_as' => 'buku',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => false,
    ),
    'komentar' => 
    array (
      'class' => 'komentar',
      'other_field' => 'akun',
      'join_self_as' => 'akun',
      'join_other_as' => 'komentar',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => false,
    ),
    'bookmark' => 
    array (
      'class' => 'bookmark',
      'other_field' => 'akun',
      'join_self_as' => 'akun',
      'join_other_as' => 'bookmark',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => false,
    ),
    'lapor' => 
    array (
      'class' => 'lapor',
      'other_field' => 'akun',
      'join_self_as' => 'akun',
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
      'confirm_password' => 'password',
    ),
    'intval' => 
    array (
      0 => 'id',
    ),
  ),
);