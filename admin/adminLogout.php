<?php
session_start();
session_destroy();
$_SESSION = array();
header('Location: https://gr-guilty-gibbons.greenriverdev.com/admin/adminLogin.php');