<?php
  function cekPost($tab, $field) {
    if (isset($_POST[$tab][$field])) return $_POST[$tab][$field]; else return null;
  }
  function activeMenu($title, $link, $view, $page) {
  	echo '<li '. (($page==$view)?'class="active"':''). '>';
  	echo anchor($link, $title);
  	echo '</li>';
  }
  function IsLogged()
  {
  	$con =& get_instance();
  	return $con->session->userdata('logged_in_id');
  }
?>