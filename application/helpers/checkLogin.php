<?php 
/*include 'helpers/functions.php';
session_start();
*/
if(!isset($_SESSION['user data'])){

    header("Location: ".url('login.php'));
}

?>