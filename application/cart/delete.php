<?php
include '../helpers/functions.php';
session_start();
$index=$_GET['id'];
if (!Validator($index,3)&&($index!=0))
{

   header("location: view.php");
}
else 
{
    array_splice($_SESSION['cart_data'], $index,1);
   // var_dump($_SESSION['cart_data']);
    if(count($_SESSION['cart_data'])==0){   unset($_SESSION["cart_data"]);}
    header("location: view.php");
}











?>