<?php
session_start();
include 'helpers/functions.php';

unset($_SESSION['user data']);
header("location:" .url('login.php'));

?>