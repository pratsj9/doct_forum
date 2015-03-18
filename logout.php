<?php
session_start();
session_unset();
session_decode();
include 'include/core.php';
redirect('index.php');
?>