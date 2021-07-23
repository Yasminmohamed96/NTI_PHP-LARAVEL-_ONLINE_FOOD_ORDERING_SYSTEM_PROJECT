<?php require 'dbConnection.php'; 

    $sql = "SELECT meals.* , resturants.resturants_name from meals INNER JOIN resturants on meals.resturants_id=resturants.resturants_id    ";

    $op  = mysqli_query($con,$sql);

echo mysqli_error($con);
?>


<!DOCTYPE html>
<html>

<head>
    <title>View All meals </title>

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
            <h1>VIEW All MEAL </h1>


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
              
                <th>meal ID</th>
                <th>meal name</th>
                <th>meal description</th>
                <th>meal price</th>
                <th>meal image</th>
                <th>resturant name</th>
                <th>Action</th>
            </tr>

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
                 <!-- <td> 
                 <a href='delete_meal.php?id=<?php echo $data['meal_id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                 <a href='edit_meal.php?id=<?php echo $data['meal_id'];?>' class='btn btn-primary m-r-1em'>Edit</a>       
                </td>
                -->
           </tr> 


         <?php } ?>
            <!-- end table -->
        </table>
        <a href='../CRUD_RESTURANTS/view_resturants.php' class='btn btn-danger m-r-1em'>back</a>

    </div>
    <!-- end .container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>
