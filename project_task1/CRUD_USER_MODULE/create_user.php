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

    $name  = CleanInputs($_POST['name']);
    $email = CleanInputs($_POST['email']);
    $password = CleanInputs($_POST['password']);
    $country = CleanInputs($_POST['country']);
    $governorate  = CleanInputs($_POST['governorate']);
    $street = CleanInputs($_POST['street']);
    $building_number = CleanInputs($_POST['building_number']);
    $flat_number = CleanInputs($_POST['flat_number']);


     // Name Validation ...
     if(!empty($name)){
       // code ... 
        if(strlen($name) < 3)
          {
           $errorMessages['name'] = "name Length must be > 2 "; 
          }
     }
     else
     {
       $errorMessages['name'] = "Required";
     }

     
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

    

      
     // Name Validation ...
     if(!empty($country))
     {
        // code ... 
         if(strlen($country) < 3)
        {
            $errorMessages['country'] = "country Length must be > 2 "; 
        }
      }
      else
      {
        $errorMessages['country'] = "Required";
      }
 
      
     // Name Validation ...
     if(!empty($governorate))
     {
        // code ... 
         if(strlen($governorate) < 3)
        {
            $errorMessages['governorate'] = "governorate Length must be > 2 "; 
        }
      }
      else
      {
        $errorMessages['governorate'] = "Required";
      }

      if(!empty($street))
      {
         // code ... 
          if(strlen($street) < 3)
         {
             $errorMessages['street'] = "street Length must be > 2 "; 
         }
       }
       else
       {
         $errorMessages['street'] = "Required";
       }

       
      if(!empty($building_number))
      {
        $building_number = filter_var($building_number,FILTER_SANITIZE_NUMBER_INT);
        if (!filter_var($building_number, FILTER_VALIDATE_INT))
         {
          $errorMessages['building_number'] = "building_number MUST BE number";

         }
      }
       else
       {
         $errorMessages['building_number'] = "Required";
       }
  

       if(!empty($flat_number))
       {
        $flat_number = filter_var($flat_number,FILTER_SANITIZE_NUMBER_INT);

         if (!filter_var($flat_number, FILTER_VALIDATE_INT))
          {
           $errorMessages['flat_number'] = "flat_number MUST BE number";
 
          }
       }
        else
        {
          $errorMessages['flat_number'] = "Required";
        }
   
////////////////////////////////////////////////////////////////////////////////////////
 
  if(count($errorMessages) == 0)
  {
    //insert all user data except address id . will insert address first to get its id  
    $sql="insert into user (user_name,user_email,user_password) values ('$name','$email','$password')";
    $op=mysqli_query($con,$sql);
    if ($op)
     {
    //insert all user address data 
     $sql2="insert into user_address (country,governorate,street,building_no,flat_no) values ('$country','$governorate','$street','$building_number','$flat_number')";
    //retrieve the last id in the address table to put in user table as his address id 
     if (mysqli_query($con, $sql2)) 
     { $last_id_addressDB = mysqli_insert_id($con);}
echo $last_id_addressDB ."  ".$email;
    // to update the user data and add address id 
     $sql3="UPDATE user SET address_id =$last_id_addressDB WHERE user_email='$email'";
     $op3=mysqli_query($con,$sql3);
     var_dump($op3);
      }
    else
      {
         echo"insertion error ";
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
<h2>NEW USER </h2>
<form  method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  enctype ="multipart/form-data">

<div class="form-group">
 <label for="exampleInputEmail1">user name</label>
 <input type="text"  name="name" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
</div>

<div class="form-group">
 <label for="exampleInputEmail1">Email</label>
 <input type="email"  name="email" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
</div>

<div class="form-group">
 <label for="exampleInputEmail1">password</label>
 <input type="password"  name="password" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
</div>

<div class="form-group">
<h2>Adress: </h2>

<div class="form-group"style="float:left">
 <label for="exampleInputEmail1">Country</label>
 <input type="text"  name="country" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
 </div>

 <div class="form-group"style="float:left">
 <label for="exampleInputEmail1">Governorate</label>
 <input type="text"  name="governorate" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
 </div>

 <div class="form-group"style="float:left">
 <label for="exampleInputEmail1">Street</label>
 <input type="text"  name="street" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
 </div>

 <div class="form-group"style="float:left">
 <label for="exampleInputEmail1">Building Number</label>
 <input type="text"  name="building_number" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
 </div>
 <div class="form-group"style="float:left">
 <label for="exampleInputEmail1">Flat Number</label>
 <input type="text"  name="flat_number" class="form-control"  id="exampleInputName" aria-describedby="" placeholder="Enter Name">
 </div>
</div>

<button type="submit" class="btn btn-primary"style="">Submit</button>

</form>
<a href='view_user.php' class='btn btn-danger m-r-1em'>View all users </a>

</div>

</body>
</html>






