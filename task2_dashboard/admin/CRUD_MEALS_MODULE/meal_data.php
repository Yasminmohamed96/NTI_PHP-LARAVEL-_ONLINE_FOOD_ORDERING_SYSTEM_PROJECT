<?php


    $id=$_GET['id'];
    $id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);
  
   $Message =array();

   if(!filter_var($id,FILTER_VALIDATE_INT))
   {

    $Message['id']="Invalid Id";
    $_SESSION['message'] = $Message;

    header("Location: ../CRUD_RESTURANTS/view_resturants.php");
   }
    $sql = "SELECT meals.* , resturants.resturants_name from meals 
            INNER JOIN resturants on meals.resturants_id=resturants.resturants_id 
            WHERE meals.resturants_id='$id'  ";

    $op  = mysqli_query($con,$sql);















?>