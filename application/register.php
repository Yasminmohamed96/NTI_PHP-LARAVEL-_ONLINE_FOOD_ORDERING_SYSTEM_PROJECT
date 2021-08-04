<?php 
include 'helpers/functions.php';
include 'helpers/db.php';



 $Message = array();

 if($_SERVER['REQUEST_METHOD'] == "POST" ){

    $name  = CleanInputs($_POST['name']);
    $email = CleanInputs($_POST['email']);
    $password = $_POST['password'];
    $country = CleanInputs($_POST['country']);
    $governorate  = CleanInputs($_POST['governorate']);
    $street = CleanInputs($_POST['street']);
    $building_number = CleanInputs($_POST['building_number']);
    $flat_number = CleanInputs($_POST['flat_number']);
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
////////////////////////////////////////////////////////////////////////////////////////   ////////////////////////////////////////////////////////////////////////////////////////////  
  if(count($Message) == 0)
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
    //echo $last_id_addressDB ."  ".$email;
    // to update the user data and add address id 
     $sql3="UPDATE user SET address_id =$last_id_addressDB WHERE user_email='$email'";
     $op3=mysqli_query($con,$sql3);
     //var_dump($op3);
     header('Location: login.php');
      }
    else
      {
        $Message['INSERTION TO DATABASE']="insertion error ";
      }
  
  }
  else
    {

  // error messages TO A SESSION  
    $_SESSION['message'] = $Message;
       
  // header('Location: index.php');
  
  }
 }





include 'header.php';
?>
  <body class="sb-nav-fixed"> 
<?php 
    include 'nav.php';
?>  
 <div id="layoutSidenav">      
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
      <a href='login.php' class='btn btn-danger m-r-1em'>Login </a>

      </div>
      </div>
    </main>

<?php 
    include 'footer.php';
?>  





