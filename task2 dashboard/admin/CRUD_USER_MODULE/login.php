<?php 
include '../helpers/functions.php';
include '../helpers/db.php';

 $errorMessages = array();
 if($_SERVER['REQUEST_METHOD'] == "POST" ){

    $email = CleanInputs($_POST['email']);
    $password = CleanInputs($_POST['password']);
    //////////////////////////////////////////////////////////////////////////////////
    if (!Validator($email,1))
    {
      $Message['email'] = "email is required";
    }
   if (!Validator($email,4))
      {
        $Message['email'] = "email is not valid ";
      }
/////////////////////////////////////////////////////////////////////////////////////////
   if (!Validator($password,1))
      {
        $Message['password'] = "password lenght is required";
      }    
  if (!Validator($password,3,8))
      {
        $Message['password'] = "password lenght is not valid";
      }
////////////////////////////////////////////////////////////////////////////////////////
  if(count($Message) == 0)
  {
    //insert all user data except address id . will insert address first to get its id  
    $sql="SELECT * FROM  user WHERE user_email='$email'&& user_password='$password' ";
    $op=mysqli_query($con,$sql);
    //echo mysqli_error($con);
    $data=mysqli_fetch_assoc($op);
    if ($op)
     {
        echo "success";
        sleep(10);
        $_SESSION['data']=$data;
        header("location: ../CRUD_RESTURANTS/view_resturants.php");
     }
    else
      {
        $Message['INSERTION TO DATABASE']="insertion error ";
      }
  
  }
  else
  {
    $_SESSION['messages'] = $Message;
  
 }
 }



?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>log in</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<h2> LOGIN </h2>
<form  method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  enctype ="multipart/form-data">

<div class="form-group">
 
<div class="form-group">
 <label for="exampleInputEmail1">Email</label>
 <input type="email"  name="email" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
</div>

<div class="form-group">
 <label for="exampleInputEmail1">password</label>
 <input type="password"  name="password" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
</div>

<button type="submit" class="btn btn-primary"style="">Submit</button>

</form>
<a href='create_user.php' class='btn btn-danger m-r-1em'>if you dont have an account please register </a>

</div>

</body>
</html>






