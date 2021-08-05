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

/*
$op= mysqli_query($con,"SELECT * FROM user_orders
                           JOIN order_meal_details
                           ON order_meal_details.order_id = order_meal_details.order_id
                           JOIN meals
                           ON meals.meal_id = order_meal_details.meal_id
                           ORDER BY order_meal_details.order_id");
                           
$result = mysqli_fetch_all($op, MYSQLI_ASSOC);*/
//echo json_encode($result);
//var_dump($result);

$op=mysqli_query($con,"SELECT * FROM user_orders WHERE user_id='$user_ID'");       
$result = mysqli_fetch_all($op, MYSQLI_ASSOC);        
    
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
                                            <th>order total quantity</th>
                                            <th>order total price </th>
                                            <th>order status </th>
                                            <th>order meal</th>
                                            <th>order meal quantity</th>
                                            <th>order single meal price</th>
                                       
                                        </thead>
                                  
                                    
                                        <tbody>
                                       
                             <?php 
                             
                             foreach ($result as $data)
                             {
                                  
                                 if($data['user_id']==$_SESSION['user data']['user_id']) 
                                 { 
                                     
                                 ?>           
                                        <tr>
                                        <td> <?php echo $data['order_title']; ?></td>
                                        <td> <?php echo $data['order_quantity']; ?></td>
                                        <td><?php echo $data['order_price']; ?></td>
                                        <td><?php echo $data['order_status']; ?></td>
                                        <td><?php echo $data['meal_name']; ?></td>
                                        <td> <?php echo $data['quantity']; ?></td>
                                        <td><?php echo $data['meal_price']; ?></td>                                        </tr>
                            <?php
                                }} ?>             
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


