<?php

include '../helpers/functions.php';
include '../helpers/db.php';

if (isset($_SESSION['cart_data'])) {
    $user_id=$_GET['id'];
    $user_id=sanitize($user_id, 1);
    if (!Validator($user_id, 3)) {
        $_SESSION['message']="Invalid Id";
        header("location:../menu.php");
    }

    $Message = array();
    $total_quantity=0;
    $total_price=0;
    for ($i=0; $i <count($_SESSION['cart_data']) ; $i++) {
        $total_quantity+=$_SESSION['cart_data'][$i][1];
        $total_price+=($_SESSION['cart_data'][$i][2]*$total_quantity);
    }
    $order_title=rand()+time();
    $status="ordered";
    $sql="insert into user_orders (order_title,order_quantity,order_price,order_status,user_id) values ('$order_title','$total_quantity','$total_price','$status','$user_id')";
    $op=mysqli_query($con, $sql);
    // echo mysqli_error($con);
    var_dump(count($_SESSION['cart_data']));
    echo('<br>');
    if ($op) {
        $order_id= mysqli_insert_id($con);
        for ($j=0; $j < count($_SESSION['cart_data']) ; $j++) {
            # insert meal id and quantity with order id
            $single_meal_quantity=$_SESSION['cart_data'][$j][1];
            $single_meal_id=$_SESSION['cart_data'][$j][0];
            var_dump($single_meal_quantity.'data');
            echo('<br>');
            
            $sql1="INSERT INTO order_meal_details (quantity,order_id,meal_id) VALUES ('$single_meal_quantity','$order_id','$single_meal_id')";
            $op1=mysqli_query($con, $sql1);
            var_dump($op1);
        
        }
        if ($op1)
        {   unset($_SESSION["cart_data"]);
            header("location:../menu.php");
        }  
    } 
    else {
        $Message[' message']=["insertion error "];
        header("location:../menu.php");
    }

}
else
{
  header("location:../menu.php");
}
?>