<?php
session_start();
session_destroy();

// setcookie('login', '', time() - 3600);

setcookie('id', '', time() - 3600);
setcookie('key', '', time() - 3600);

header("location: login.php");
