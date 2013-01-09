<?php
  function activeMenu($title, $link, $view, $page) {
  	echo '<li '. (($page==$view)?'class="active"':''). '>';
  	echo anchor($link, $title);
  	echo '</li>';
  }
?>