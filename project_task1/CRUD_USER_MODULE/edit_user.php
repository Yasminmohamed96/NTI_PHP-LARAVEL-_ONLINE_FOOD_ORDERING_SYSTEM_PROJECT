<?php 

   require 'dbConnection.php';
    
   $id = $_GET['id'];
   $id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);
  
   $message = "";

   if(!filter_var($id,FILTER_VALIDATE_INT)){

    $_SESSION['message'] = "Invalid Id";

    header("Locattion: view_user.php");
   }




# Clean input ...
function CleanInputs($input)
{

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
      $addr_id=$_POST['addresss_id'];
  
  
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
     
     $sql3="update user set user_name='$name',user_email='$email',user_password='$password' where user_id=$id ";
     $op3=mysqli_query($con,$sql3);
     $sql4="update user_address set country='$country',governorate='$governorate',street='$street',building_no='$building_number' ,flat_no='$flat_number' where address_id=$addr_id ";
     $op4=mysqli_query($con,$sql4);
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
  
/*
     // Fetch single Row of Data .... 
     $sql = "select * from user where user_id=$id ";
     $op = mysqli_query($con,$sql); 
     $data = mysqli_fetch_assoc($op);
     $addr_id=$data['address_id'];
     $sql2 = "select * from user_address where address_id=$addr_id ";
     $op2 = mysqli_query($con,$sql2); 
     $add_data = mysqli_fetch_assoc($op2);
*/
  $sql="SELECT user.* ,user_address.* FROM user INNER JOIN user_address ON user.address_id=user_address.address_id WHERE user_id=$id ";
  $op = mysqli_query($con,$sql);
  $data = mysqli_fetch_assoc($op);
//var_dump($data);

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
<h2>EDIT USER DATA </h2>
<form  method="post"  action="edit_user.php?id=<?php echo $data['user_id'];?>"  enctype ="multipart/form-data">
<div class="form-group">
 <label for="exampleInputEmail1">user name</label>
 <input type="text"  name="name" value="<?php echo $data['user_name'];?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
</div>

<div class="form-group">
 <label for="exampleInputEmail1">Email</label>
 <input type="email"  name="email" value="<?php echo $data['user_email'];?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
</div>

<div class="form-group">
 <label for="exampleInputEmail1">password</label>
 <input type="text"  name="password" value="<?php echo $data['user_password'];?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
</div>
<div class="form-group">
 <input type="hidden"  name="addresss_id" value="<?php echo $data['address_id'];?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
 </div>
<div class="form-group">
<h2>Adress: </h2>

<div class="form-group"style="float:left">
 <label for="exampleInputEmail1">Country</label>
 <input type="text"  name="country" value="<?php echo $data['country'];?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
 </div>

 <div class="form-group"style="float:left">
 <label for="exampleInputEmail1">Governorate</label>
 <input type="text"  name="governorate" value="<?php echo $data['governorate'];?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
 </div>

 <div class="form-group"style="float:left">
 <label for="exampleInputEmail1">Street</label>
 <input type="text"  name="street" value="<?php echo $data['street'];?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
 </div>

 <div class="form-group"style="float:left">
 <label for="exampleInputEmail1">Building Number</label>
 <input type="text"  name="building_number" value="<?php echo $data['building_no'];?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
 </div>
 <div class="form-group"style="float:left">
 <label for="exampleInputEmail1">Flat Number</label>
 <input type="text"  name="flat_number" value="<?php echo $data['flat_no'];?>" class="form-control"  id="exampleInputName" aria-describedby="" placeholder="Enter Name">
 </div>
</div>

<button type="submit" class="btn btn-primary"style="">Submit</button>

</form>
<a href='view_user.php' class='btn btn-danger m-r-1em'>Go Back to View all users </a>

</div>

</body>
</html>


