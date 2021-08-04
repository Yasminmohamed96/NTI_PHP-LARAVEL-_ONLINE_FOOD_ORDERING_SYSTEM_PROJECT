  <?php
    //include 'helpers/db.php';
    $sql = "SELECT meals.* , resturants.resturants_name from meals INNER JOIN resturants on meals.resturants_id=resturants.resturants_id    ";

    $op  = mysqli_query($con,$sql);
?>