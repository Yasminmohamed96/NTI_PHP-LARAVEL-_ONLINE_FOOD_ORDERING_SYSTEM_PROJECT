<?php
include '../helpers/functions.php';
session_start();


$Message = array();
$temp_array;
if($_SERVER['REQUEST_METHOD'] == "POST" ){

   $quantity=(int)CleanInputs($_POST['quantity']);
   $index=(int)CleanInputs($_POST['index']);
   $price=(int)CleanInputs($_POST['price']);

   if(!Validator($price,1)&&($index!=0))
   {
     $Message['price'] = $price."is required";
   }
   $price=Sanitize($price,1);

  if (!Validator($price,3)&&($index!=0))
   {
     $Message['price'] = "Invalid price must be a number";
   }

  // echo $index .'<br>'.$quantity.'<br>'; 
   if(!Validator($quantity,1)&&($index!=0))
     {

       $Message['quantity'] = $quantity."is required";
     }
     $quantity=Sanitize($quantity,1);

    if (!Validator($quantity,3)&&($index!=0))
     {
       $Message['quantity'] = "Invalid quantity must be a number";
     }

     if(!Validator($index,1)&&($index!=0))
     {
       $Message['index'] = $index."is required";
     }
     $index=Sanitize($index,1);

    if (!Validator($index,3)&&($index!=0))
     {
        echo $index;
       
       $Message['index'] = "Invalid index must be a number";
     }

     
if(count($Message) == 0)
{
   
    $temp_array=$_SESSION['cart_data'];
    for ($i=0; $i <count($temp_array) ; $i++)
     { 
       if ($i==$index)
       {
        $temp_array[$i][1]=$quantity;
       }
    }
    $_SESSION['cart_data']=$temp_array;
    header("location: view.php");
}
else 
{

    $_SESSION['message']=$Message;
   header("location: view.php");
}
}
?>