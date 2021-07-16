<?php 
  require 'dbConnection.php';

  $id = $_GET['id'];

  $id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);

 
  $message = '';

  if(filter_var($id,FILTER_VALIDATE_INT)){
    
    // code .... 
    $sql1 = "SELECT * from resturants where category__id =".$id;
    $op1 = mysqli_query($con,$sql1);
    $DATA=mysqli_fetch_assoc($op1);
    $path=$DATA['resturants_image'];
    unlink($path);
    $sql = "delete from resturants_category where category_id =".$id;

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

    header("Location: view_resturants.php");


?>