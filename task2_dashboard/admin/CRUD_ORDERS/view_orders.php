
<?php 
include '../helpers/functions.php';
include '../helpers/db.php'; 

   
// $op= mysqli_query($con,"SELECT * FROM user_orders
// JOIN order_meal_details
// ON order_meal_details.order_id = order_meal_details.order_id
// JOIN meals
// ON meals.meal_id = order_meal_details.meal_id
// ORDER BY order_meal_details.order_id");

//$op=mysqli_query($con,"SELECT * FROM user_orders ");       
   
$op= mysqli_query($con,"SELECT * FROM user_orders
JOIN order_meal_details
ON order_meal_details.order_id = order_meal_details.order_id
JOIN meals
ON meals.meal_id = order_meal_details.meal_id
ORDER BY order_meal_details.order_id");
$result=mysqli_fetch_all($op,MYSQLI_ASSOC);
//var_dump($result);
//exit();

//    $op  = mysqli_query($con,$sql);



    include '../header.php';
    ?>
      
      <body class="sb-nav-fixed">
            
        
    <?php 
        include '../nav.php';
    ?>  
    
    
            <div id="layoutSidenav">
                      
             
    <?php 
        include '../sidNav.php';
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
                    
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Order data </li>
                    <?php } ?>
               
                        
                        
                        </ol>
     
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                DataTable 
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                             <td> order id </td>
                                            <th>order title</th>
                                            <th>order total quantity</th>
                                            <th>order total price </th>
                                            <th>order status </th>
                                            <th>order meal id</th>
                                            <th>order meal name </th>
                                            <th>order meal quantity</th>
                                            <th>order single meal price</th>
                                           
                                       
                                            </tr>

                                         <?php   
                                         // var_dump($result);
                                          for ($i=0;$i<count($result);$i++) {
                                         ?>          
                                        <tr>
                                        <td> <?php echo $result[$i]['order_title']; ?></td>
                                        <td> <?php echo $result[$i]['order_quantity']; ?></td>
                                        <td><?php echo $result[$i]['order_price']; ?></td>
                                        <td><?php echo $result[$i]['order_status']; ?></td>
                                        <td><?php echo $result[$i]['meal_id']; ?></td>
                                        <td><?php echo $result[$i]['meal_name']; ?></td>
                                        <td> <?php echo $result[$i]['quantity']; ?></td>
                                        <td><?php echo $result[$i]['meal_price']; ?></td> 
                       
                                        <td>
                                        <a href='delete_order.php?id=<?php echo $data['order_id']; ?>' class='btn btn-danger m-r-1em'>Delete</a>
                                        <a href='edit_order_status.php?id=<?php echo $data['order_id']; ?>' class='btn btn-primary m-r-1em'>update status</a>       
                                        </td>                               
                 </tr> 

                                        <?php }
                                           ?>             
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>




               
    
                
<?php 
    include '../footer.php';
?>  

                
  
