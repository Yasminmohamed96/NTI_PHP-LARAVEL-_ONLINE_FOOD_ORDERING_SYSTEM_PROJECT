<?php 

    require 'dbConnection.php'; 

    $sql = "select user.* , user_address.* from user inner join user_address on user.address_id=user_address.address_id    ";

    $op  = mysqli_query($con,$sql);


?>


<!DOCTYPE html>
<html>

<head>
    <title>View All Users </title>

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
            <h1>VIEW All Users </h1>


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
                <th>ID</th>
                <th>user name</th>
                <th>user email</th>
                <th>user password</th>
                <th>user address</th>
                <th>Action</th>
            </tr>

           <?php    
               while($data = mysqli_fetch_assoc($op)){
           
           ?>
<!-- SELECT `user_id`, `user_name`, `user_email`, `user_password`, `address_id` FROM `user` WHERE 1 -->
<!-- SELECT `address_id`, `country`, `governorate`, `street`, `building_no`, `flat_no` FROM `user_address` WHERE 1 -->
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
            <!-- end table -->
        </table>
        <a href='create_user.php' class='btn btn-danger m-r-1em'>register new user </a>

    </div>
    <!-- end .container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>
