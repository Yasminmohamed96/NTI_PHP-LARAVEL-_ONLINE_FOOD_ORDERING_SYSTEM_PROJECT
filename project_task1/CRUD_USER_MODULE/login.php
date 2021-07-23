<?php require "dbconnection.php";

# Clean input ...
function CleanInputs($input){

 $input = trim($input);
 $input = stripcslashes($input);
 $input = htmlspecialchars($input);

 return $input;
}

 $errorMessages = array();
 if($_SERVER['REQUEST_METHOD'] == "POST" ){

    $email = CleanInputs($_POST['email']);
    $password = CleanInputs($_POST['password']);
     
    if(!empty($email))
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
          $errorMessages['email'] = "it is not valid email address";
        }
      }
     else
         {
          $errorMessages['email'] = "Required";
         }
        
             

    if(!empty($password))
    { 
      if(strlen($password)<8)
      {
        $errorMessages['password'] = "password lenght is not valid ";

      }
    }
    else 
    {
      $errorMessages['password'] = "Required";
    }

    

      

////////////////////////////////////////////////////////////////////////////////////////
 
  if(count($errorMessages) == 0)
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
        $_SESSION=[$data];
        header("location: ../CRUD_RESTURANTS/view_resturants.php");
     }
    else
      {
         echo"insertion error please register ";
      }
  
  }
  else
  {

  // print error messages 
  foreach($errorMessages as $key => $value)
  {
     echo '* '.$key.' : '.$value.'<br>';
  }
 }
 }



?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>CREATE</title>
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






