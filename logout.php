<?php

use App\Lib\Session;

require('autoloader.php');
$session = new Session;
$session->logout();
header("Location: login.php");
?>