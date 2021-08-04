<?php 
include '../helpers/functions.php';
include '../helpers/db.php'; 

    $sql = "SELECT resturants.* , resturants_category.* from resturants INNER JOIN resturants_category on resturants.category__id=resturants_category.category_id    ";

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
                            <li class="breadcrumb-item active">RESTURANTS DATA </li>
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
                                            <th>Resturant ID</th>
                                            <th>Resturant name</th>
                                            <th>Resturant address</th>
                                            
                                            <th>Resturant phone</th>
                                            <th>Resturant image</th>
                                            <th>Resturant category</th>
                                            <th>Action</th>
                                            <th>Resturant meals</th>
                                            <th>Resturant url</th>
                                            </tr>

           <?php    
               while($data = mysqli_fetch_assoc($op)){
           
           ?>
        <tr>
                 <td> <?php echo $data['resturants_id'];?></td>
                 <td> <?php echo $data['resturants_name'];?></td>
                 <td> <?php echo $data['resturants_address'];?></td>
                 
                 <td> <?php echo $data['resturants_phone'];?></td>
                 <td> <img src="<?=$data['resturants_image']; ?>" style=" width:100px; width:100px; " /></td> </td>
                 <td> <?php echo $data['category_name'];?></td>
                 <td>
                 <a href='delete_resturants.php?id=<?php echo $data['category__id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                 <a href='edit_resturants.php?id=<?php echo $data['resturants_id'];?>' class='btn btn-primary m-r-1em'>Edit</a>       
                </td>
                 <td>
                 <a href='../CRUD_MEALS_MODULE/create_meal.php?id=<?php echo $data['resturants_id'];?>' class='btn btn-danger m-r-1em'>ADD </a>       
                 <a href='../CRUD_MEALS_MODULE/view_meal.php?id=<?php echo $data['resturants_id'];?>'class='btn btn-primary m-r-1em'>ALL</a>       
                </td>
                <td> <?php echo $data['resturants_url'];?></td>
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

                
  