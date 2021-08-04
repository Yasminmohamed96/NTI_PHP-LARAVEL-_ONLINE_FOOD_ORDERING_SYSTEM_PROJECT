<?php 
  include '../helpers/functions.php';
  include '../helpers/db.php';

  $sql = "select user.* , user_address.* from user inner join user_address on user.address_id=user_address.address_id    ";

  $op  = mysqli_query($con,$sql);

  
  
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
                            <li class="breadcrumb-item active">USERS DATA </li>
                    <?php } ?>
               
                        
                        
                        </ol>
    
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                               
                                                <th>ID</th>
                                                <th>user name</th>
                                                <th>user email</th>
                                                <th>user password</th>
                                                <th>user address</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                  
                                    
                                        <tbody>
                                       
                             <?php 
                             
                                while($data = mysqli_fetch_assoc($op)){
                             
                             ?>           
                                        <tr>
                                        <td> <?php echo $data['user_id'];?></td>
                                        <td> <?php echo $data['user_name'];?></td>
                                        <td> <?php echo $data['user_email'];?></td>
                                        <td> <?php echo $data['user_password'];?></td>
                                            <?php
                                            $address="";
                                            $address .=$data['country'] .', '.$data['governorate'] .', '.$data['building_no'] .' '.$data['street'] .' ,flat number '.$data['flat_no'] ;
                                            ?>
                                        <td> <?php echo $address?></td>

                                        <td>
                                        <a href='delete_user.php?id=<?php echo $data['address_id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                                        <a href='edit_user.php?id=<?php echo $data['user_id'];?>' class='btn btn-primary m-r-1em'>Edit</a>       
                                        </td>
                                        </tr>
                            <?php } ?>             
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

