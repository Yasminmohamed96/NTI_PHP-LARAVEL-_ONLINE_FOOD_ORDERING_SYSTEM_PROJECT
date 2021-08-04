<?php 
include '../helpers/functions.php';
include '../helpers/db.php';

  $id = $_GET['id'];

  $id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);

 
  $message = array();

  if(filter_var($id,FILTER_VALIDATE_INT)){
    
    // code .... 
    $sql1 = "SELECT * from resturants where category__id =".$id;
    $op1 = mysqli_query($con,$sql1);
    $DATA=mysqli_fetch_assoc($op1);
    $path=$DATA['resturants_image'];
   
    $sql = "delete from resturants_category where category_id =".$id;
    unlink($path);
    $op = mysqli_query($con,$sql);

    if($op){
        
        $message['result'] = "user Deleted .";
    
    }else{

      $message['result']= "Error Try Again !!!";
    }


  }else{
    $message['result']= "Invalid id";
  }


    $_SESSION['message'] = $message;

    header("Location: view_resturants.php");


?>