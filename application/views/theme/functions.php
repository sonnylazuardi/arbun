<?php
  function cekPost($tab, $field) {
    if (isset($_POST[$tab][$field])) return $_POST[$tab][$field]; else return null;
  }
?>