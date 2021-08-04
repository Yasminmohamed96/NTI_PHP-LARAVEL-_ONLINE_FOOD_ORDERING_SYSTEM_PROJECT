<?php 
include '../helpers/functions.php';
include '../helpers/db.php';
include 'rest_data.php';


//echo mysqli_error($con);

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
                            <li class="breadcrumb-item active">RESTURANT MEALS DATA </li>
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
                                            
                                            <th>meal ID</th>
                                            <th>meal name</th>
                                            <th>meal description</th>
                                            <th>meal price</th>
                                            <th>meal image</th>
                                            <th>resturant name</th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                  
                                    
                                        <tbody>
                                       
                             <?php 
                             
                                while($data = mysqli_fetch_assoc($op)){
                             
                             ?>           
                                        <tr>
                                        
                                        <td> <?php echo $data['meal_id'];?></td>
                                        <td> <?php echo $data['meal_name'];?></td>
                                        <td> <?php echo $data['meal_description'];?></td>
                                        <td> <?php echo $data['meal_price'];?></td>
                                        <td> <img src="<?=$data['meal_image']; ?>" style=" width:100px; width:100px; " /></td> </td>
                                        <td> <?php echo $data['resturants_name'];?></td>
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

                
  