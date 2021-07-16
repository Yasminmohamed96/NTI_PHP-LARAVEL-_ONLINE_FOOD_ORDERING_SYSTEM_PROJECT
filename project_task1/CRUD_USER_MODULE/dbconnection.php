<?php

$server="localhost";
$dbName="online_resturants";
$dbUser="root";
$dbPassword="";
session_start();
$con=mysqli_connect($server,$dbUser,$dbPassword,$dbName);

if ($con)
{
    //echo"connection is done ";
}
else 
{
    die('ErrorMessage'.mysqli_connect_error());
}

?>

<?php 

