<?php 


if(!isset($_SESSION['user data'])){

    header("Location: "._url_('admin/login.php'));
}

?>