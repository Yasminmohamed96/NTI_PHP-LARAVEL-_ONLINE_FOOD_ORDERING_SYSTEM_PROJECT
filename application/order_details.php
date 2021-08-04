<?php
ob_start();
include 'helpers/functions.php';
include 'helpers/db.php';
include 'header.php';
include 'nav.php';
include 'helpers/checkLogin.php';
?>
<section id="contact-u">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Our Menu</h2>
                <p class="text-center wow fadeInDown">When you hungry Enjoy our meals    <br> Welcom.</p>
            </div>
            
            <?php 


// $op= mysqli_query($con,"SELECT * FROM user_orders
//                            JOIN order_meal_details
//                            ON order_meal_details.order_id = order_meal_details.order_id
//                            JOIN meals
//                            ON meals.meal_id = order_meal_details.meal_id
//                            ORDER BY order_meal_details.order_id");
                           
// $result = mysqli_fetch_all($op, MYSQLI_ASSOC);
//echo json_encode($result);
//var_dump($result);
$result=array();
if(isset($_SESSION['user_order_ids']))
{
    for ($i=0; $i < count($_SESSION['user_order_ids']) ; $i++) 
    { 
        # code...
        $order_id=$_SESSION['user_order_ids'][$i]['order_id'];
        $op=mysqli_query($con,"SELECT * FROM order_meal_details
                                    JOIN meals
                                    ON meals.meal_id = order_meal_details.meal_id
                                    WHERE order_meal_details.order_id='$order_id'"); 
                                    
        $result[$i] = mysqli_fetch_all($op, MYSQLI_ASSOC); 

    }
}
 var_dump($result,'<br>');
 //exit();
?>
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">


                        <?php 
                        

                        if(isset($_SESSION['message'])){

                           foreach($_SESSION['message'] as $key =>  $dataa){

                            echo '* '.$key.' : '.$dataa.'<br>';
                           }

                             unset($_SESSION['message']);
                         }else{
                    ?>
                    
                            <li class="breadcrumb-item"><a href="menu.php">menu</a></li>
                            <li class="breadcrumb-item active">your order data  </li>
                            <li class="breadcrumb-item"><a href="order_details.php">orders details</a></li>
                    <?php } ?>
               
                        
                        
                        </ol>
    
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Orders
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                               
                                            <th>order ID</th>
                                            <th>order status </th>
                                            <th>order meal</th>
                                            <th>order meal quantity</th>
                                            <th>order single meal price</th>
                                       
                                        </thead>
                                  
                                    
                                        <tbody>
                                       
                             <?php 
                             
                             for ($i=0;$i<count($result);$i++)
                             {
                                  
                                
                                     
                                 ?>           
                                        <tr>
                                        <td> <?php echo $_SESSION['user_order_ids'][$i]['order_title']; ?></td>
                                        <td><?php echo $_SESSION['user_order_ids'][$i]['order_status']; ?></td>
                                        <td><?php echo $result[$i][$i]['meal_name']; ?></td>
                                        <td> <?php echo $result[$i][$i]['quantity']; ?></td>
                                        <td><?php echo $result[$i][$i]['meal_price']; ?></td>  
                                                                          </tr>
                            <?php
                                } ?>             
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>


                </div>

</div>
</section><!--/#pricing-->

               
    


    <?php 
include "footer.php";
?>


