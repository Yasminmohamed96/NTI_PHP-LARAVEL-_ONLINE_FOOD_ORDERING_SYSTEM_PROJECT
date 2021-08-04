<?php 

include '../helpers/functions.php';
include '../helpers/db.php';
    
   $id = $_GET['id'];
   $id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);
  
   
   $Message = array();

   if(!filter_var($id,FILTER_VALIDATE_INT)){
    $Message['id']="Invalid Id";
    $_SESSION['message'] =$Message; 

    header("Location: view_user.php");
   }

   if($_SERVER['REQUEST_METHOD'] == "POST" ){
  
      $name  = CleanInputs($_POST['name']);
      $email = CleanInputs($_POST['email']);
      $password =$_POST['password'];
      $country = CleanInputs($_POST['country']);
      $governorate  = CleanInputs($_POST['governorate']);
      $street = CleanInputs($_POST['street']);
      $building_number = CleanInputs($_POST['building_number']);
      $flat_number = CleanInputs($_POST['flat_number']);
      $addr_id=$_POST['address_id'];
  
         if (!Validator($name,1))
          {
            $Message['name'] = "name is required";
          }
        if(!Validator($name,2))
          {
            $Message['name'] = "Invalid name lenght";
          }
  //////////////////////////////////////////////////////////////////////////////////////////////////
  if (!Validator($country,1))
  {
    $Message['country'] = "country is required";
  }
  if(!Validator($country,2))
  {
    $Message['country'] = "Invalid country lenght";
  }
   //////////////////////////////////////////////////////////////////////////////////////////////////
   if (!Validator($governorate,1))
   {
     $Message['governorate'] = "governorate is required";
   }
   if(!Validator($governorate,2))
   {
     $Message['governorate'] = "Invalid governorate lenght";
   }
    //////////////////////////////////////////////////////////////////////////////////////////////////
  if (!Validator($street,1))
  {
    $Message['street'] = "street is required";
  }
  if(!Validator($street,2))
  {
    $Message['street'] = "Invalid street lenght";
  }
      ///////////////////////////////////////////////////////////////////////////////////////////
      if (!Validator($email,1))
      {
        $Message['email'] = "email is required";
      }
     if (!Validator($email,4))
        {
          $Message['email'] = "email is not valid ";
        }
        //////////////////////////////////////////////////////////////////////////////////////////  
          if(!Validator($flat_number,1))
          {
            $Message['flat_number'] = "flat_number is required";
          }
          $flat_number=Sanitize($flat_number,1);
  
         if (!Validator($flat_number,3))
          {
            $Message['flat_number'] = "Invalid flat_numbermust be a number";
          }
 //////////////////////////////////////////////////////////////////////////////////////////  
            if(!Validator($building_number,1))
            {
              $Message['building_number'] = "building_number is required";
            }
            $building_number=Sanitize($building_number,1);
    
           if (!Validator($building_number,3))
            {
              $Message['building_number'] = "Invalid building_number be a number";
            }
            
  ////////////////////////////////////////////////////////////////////////////////////////////////
      if (!Validator($password,1))
          {
            $Message['password'] = "password lenght is required";
          }    
      if (!Validator($password,2,8))
          {
            $Message['password'] = "password lenght is not valid";
          }
  ////////////////////////////////////////////////////////////////////////////////////////
   
    if(count($Message) == 0)
    {
     
     $sql3="UPDATE user SET user_name='$name',user_email='$email',user_password='$password' WHERE user_id=$id ";
     $op3=mysqli_query($con,$sql3);
     $sql4="UPDATE user_address SET country='$country',governorate='$governorate',street='$street',building_no=$building_number ,flat_no=$flat_number WHERE address_id=$addr_id ";
     $op4=mysqli_query($con,$sql4);
    }
    else
      {
        $_SESSION['messages'] = $Message;
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
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">

    <?php 
    
        if(isset($_SESSION['message'])){

            foreach($_SESSION['message'] as $key =>  $dataa){

            echo '* '.$key.' : '.$dataa.'<br>';
            }

              unset($_SESSION['message']);
          }else{
    ?>
    
    <li class="breadcrumb-item active">Add New User</li>
    <?php } ?>
    
    
    
          </ol>
<div class="container">

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
 <input type="hidden"  name="address_id" value="<?php echo $data['address_id'];?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
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

</div>
    </main>

<?php 
    include '../footer.php';
?>  



