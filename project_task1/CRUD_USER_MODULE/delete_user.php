<?php 

  require 'dbConnection.php';

  $id = $_GET['id'];

  $id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);

  $message = '';

  if(filter_var($id,FILTER_VALIDATE_INT)){
    
    // code .... 
    $sql = "delete from user_address where address_id =".$id;

    $op = mysqli_query($con,$sql);
     
    if($op){

        $message = "user Deleted .";
    
    }else{

        $message = "Error Try Again !!!";
    }


  }else{
      $message = "Invalid id";
  }


    $_SESSION['message'] = $message;

    header("Location: view_user.php");


?>