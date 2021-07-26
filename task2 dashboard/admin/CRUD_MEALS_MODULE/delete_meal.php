<?php 

include '../helpers/functions.php';
include '../helpers/db.php';

  $id = $_GET['id'];

  $id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);

  $message = array();

  if(filter_var($id,FILTER_VALIDATE_INT)){
    
    // code .... 
    $sql1="SELECT meal_image ,resturants_id FROM meals WHERE  meal_id =$id";
    $op1 = mysqli_query($con,$sql1);
    $data=mysqli_fetch_assoc($op1);
    $old_file=$data['meal_image'];
      

    $sql = "delete from meals where meal_id =".$id;
    unlink($old_file);
    $op = mysqli_query($con,$sql);
     
    if($op){
     
        $message['result'] = "meal Deleted .";
    
    }else{

        $message['result']= "Error Try Again !!!";
    }


  }else{
      $message['result'] = "Invalid id";
  }


    $_SESSION['message'] = $message;
    $rest_id=$data["resturants_id"];
    header("Location: view_meal.php?id=".$rest_id);


?>