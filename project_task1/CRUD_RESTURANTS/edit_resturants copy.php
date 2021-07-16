<?php require 'dbConnection.php';
   $iid = isset($_GET['id']) ? $_GET['id'] : '';
   $iid=filter_var($iid,FILTER_SANITIZE_NUMBER_INT);
  
   $message = "";

   if(!filter_var($iid,FILTER_VALIDATE_INT)){

    $_SESSION['message'] = "Invalid Id";

    header("Locattion: view_resturants.php");
   }
   echo $iid;
   ?>