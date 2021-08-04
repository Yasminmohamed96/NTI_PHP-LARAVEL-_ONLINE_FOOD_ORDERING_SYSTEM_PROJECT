<?php 

include '../helpers/functions.php';
include '../helpers/db.php';

  $id = $_GET['id'];

  $id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);

  $message = array();

  if(filter_var($id,FILTER_VALIDATE_INT)){
    
    $sql = "delete from user_orders where order_id =".$id;
    $op = mysqli_query($con,$sql);
     
    if($op){
     
        $message['result'] = "order Deleted .";
    
    }else{

        $message['result']= "Error Try Again !!!";
    }


  }else{
      $message['result'] = "Invalid id";
  }


    $_SESSION['message'] = $message;
      header("Location: view_orders.php");


?>