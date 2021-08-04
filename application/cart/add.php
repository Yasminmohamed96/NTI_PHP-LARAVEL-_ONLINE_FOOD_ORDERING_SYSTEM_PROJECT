<?php
 session_start();
//validate input meal id and quantity
include '../helpers/functions.php';
$Message = array();
$previous;
$current;
if($_SERVER['REQUEST_METHOD'] == "POST" ){


   $id=CleanInputs($_POST['mealID']);
   $quantity=CleanInputs($_POST['quantity']);
   $price=CleanInputs($_POST['price']);
   if(!Validator($id,1))
     {
       $Message['id'] = $id."is required";
     }
     $id=Sanitize($id,1);

    if (!Validator($id,3))
     {
       $Message['id'] = "Invalid id must be a number";
     }

     if(!Validator($price,1))
     {
       $Message['price'] = $price."is required";
     }
     $price=Sanitize($price,1);

    if (!Validator($price,3))
     {
       $Message['price'] = "Invalid price must be a number";
     }


     if(!Validator($quantity,1))
     {
       $Message['quantity'] = $quantity."is required";
     }
     $quantity=Sanitize($quantity,1);

    if (!Validator($quantity,3))
     {
       $Message['message'] = "Invalid quantity must be a number";
     }

    if(count($Message) == 0)
    {
        //set session data ,add coming data to existing cart data (meal id , quantity )as an associative array
        if(isset($_SESSION['cart_data']) && !empty($_SESSION['cart_data']))
        {
         
          $r= (in_array($id , $_SESSION['cart_data'])?1:0 );
          if($r==0)
          {
            
            $previous=$_SESSION['cart_data'];
            $current=array([$id,$quantity,$price]);
            $previous=array_merge($previous,$current);
            $_SESSION['cart_data']=$previous;
            header("Location: ../menu.php");
          }
          else 
          {
            $Message['message']="already exists in the cart ";
            //echo"<script>alert('already exists');<script/>";
            header("Location: ../menu.php");
          }
        }
        else 
        {
        $previous = array([$id,$quantity,$price]);
        $_SESSION['cart_data']=$previous;
        header("Location: ../menu.php");
        }
    }
    else 
    {
        $Message['message']="insertion error ";
        header("Location: ../menu.php");
    }


}

?>