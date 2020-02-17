<?php
session_start();
session_destroy();

setcookie('login', '', time() - 3600);

header("location: login.php");
