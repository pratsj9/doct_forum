<?php
session_start();
session_unset();
session_destroy();
include 'include/core.php';
redirect("index.php");
?>