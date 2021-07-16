<?php require 'dbConnection.php'; 

    $sql = "SELECT resturants.* , resturants_category.* from resturants INNER JOIN resturants_category on resturants.category__id=resturants_category.category_id    ";

    $op  = mysqli_query($con,$sql);


?>


<!DOCTYPE html>
<html>

<head>
    <title>View All Resturants </title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }
        
        .m-b-1em {
            margin-bottom: 1em;
        }
        
        .m-l-1em {
            margin-left: 1em;
        }
        
        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container">
 

        <div class="page-header">
            <h1>VIEW All Resturant </h1>


      <?php 
      
        if(isset($_SESSION['message']))
        {
            echo '* '.$_SESSION['message'];
        }
         unset($_SESSION['message']);
      ?>

        </div>

        <!-- PHP code to read records will be here -->



        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
              
                <th>resturant ID</th>
                <th>resturant name</th>
                <th>resturant address</th>
                <th>resturant url</th>
                <th>resturant phone</th>
                <th>resturant image</th>
                <th>resturant category name</th>
                <th>Action</th>
            </tr>

           <?php    
               while($data = mysqli_fetch_assoc($op)){
           
           ?>
        <tr>
                 <td> <?php echo $data['resturants_id'];?></td>
                 <td> <?php echo $data['resturants_name'];?></td>
                 <td> <?php echo $data['resturants_address'];?></td>
                 <td> <?php echo $data['resturants_url'];?></td>
                 <td> <?php echo $data['resturants_phone'];?></td>
                 <td> <img src="<?=$data['resturants_image']; ?>" style=" width:100px; width:100px; " /></td> </td>
                 <td> <?php echo $data['category_name'];?></td>

                 <td>
                 <td>
                 <a href='delete_resturants.php?id=<?php echo $data['category__id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                 <a href='edit_resturants.php?id=<?php echo $data['resturants_id'];?>' class='btn btn-primary m-r-1em'>Edit</a>       
                </td>
                </td>

           </tr> 


         <?php } ?>
            <!-- end table -->
        </table>
        <a href='create_resturants.php' class='btn btn-danger m-r-1em'>register new resturants </a>

    </div>
    <!-- end .container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>
