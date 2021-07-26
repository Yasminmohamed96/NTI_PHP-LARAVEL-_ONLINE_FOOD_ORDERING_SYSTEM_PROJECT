<?php 
include '../helpers/functions.php';
include '../helpers/db.php';
$rest_id=$_GET['id'];
//echo $rest_id;
$rest_id=filter_var($rest_id,FILTER_SANITIZE_NUMBER_INT);
$message="";
if(!filter_var($rest_id,FILTER_VALIDATE_INT))
{
  $_SESSION['message']="Invalid Id";
 header("location:../CRUD_RESTURANTS/view_resturants.php");
}

$Message = array();
if($_SERVER['REQUEST_METHOD'] == "POST" ){

   $name_=CleanInputs($_POST['name']);
   $description=CleanInputs($_POST['description']);
   $price=CleanInputs($_POST['price']);

     if (!Validator($name_ ,1))
      {
        $Message['name'] = "name is required";
      }
    if(!Validator($name_ ,2))
      {
        $Message['name'] = "Invalid name lenght";
      }
  
      /////////////////////////////////////////////////////////////////
      if (!Validator($name_ ,1))
      {
        $Message['description' ] = "description is required";
      }
    if(!Validator($description ,2))
      {
        $Message['description' ] = "Invalid description lenght";
      }
  
      /////////////////////////////////////////////////////////////////
  if(!Validator($price,1))
     {
       $Message[$$price] = $price."is required";
     }
     $price=Sanitize($price,1);

    if (!Validator($price,3))
     {
       $Message[price] = "Invalid price must be a number";
     }


     if(!empty($_FILES['meal_image']['name']) && isset($_FILES['meal_image']['name']) ){
         // CODE ... 
       $tmp_path = $_FILES['meal_image']['tmp_name'];
       $name     = $_FILES['meal_image']['name'];
       $size     = $_FILES['meal_image']['size'];
       $type     = $_FILES['meal_image']['type'];
         
  
       $nameArray = explode('.',$name);
       $FileExtension = strtolower($nameArray[1]);
  
       $FinalName = rand().time().'.'.$FileExtension;
  
        $allowedExtension = ['png','jpg','jpeg'];    
  
         if(in_array($FileExtension,$allowedExtension))
         {
          // code ....
        
          $disFolder = './uploads/';
          
          $disPath  = $disFolder.$FinalName;
  
           if(move_uploaded_file($tmp_path,$disPath))
             {
                //echo 'File Uploaded'.'<br>';
  
             }else
             {
              $Message['meal_image'] = "meal_image is not uploaded ";
             }
  
         }
         else
         {
          $Message['meal_image'] = "meal_image extension is not valid ";
        }
     }
      else
      {
        $Message['meal_image'] = "meal_image  is required ";
      } 
 
 
   

////////////////////////////////////////////////////////////////////////////////////////
 
  if(count($Message) == 0)
  {
    //insert all resturants data except category__id. will insert category first to get its id  
    $sql="insert into meals (meal_name,meal_description,meal_price,meal_image,resturants_id) values ('$name_','$description','$price','$disPath','$rest_id')";
    $op=mysqli_query($con,$sql);
   // echo mysqli_error($con);

    if ($op)
     {
     }
    else
      {
        $Message[' DATABASE error']="insertion error ";
      }
  
  }
  else
  {


    // error messages TO A SESSION  
    $_SESSION['message'] = $Message;
}
 

}

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

            foreach($_SESSION['message'] as $key =>  $data){

            echo '* '.$key.' : '.$data.'<br>';
            }

              unset($_SESSION['message']);
          }else{
    ?>
    
    <li class="breadcrumb-item active">Add New User</li>
    <?php } ?>
    
    
    
          </ol>
<div class="container">
<h2>Add New Meal </h2>
<form  method="post"  action="create_meal.php?id=<?php echo $rest_id;?>"  enctype ="multipart/form-data">

<div class="form-group">
 <label for="exampleInputEmail1">Meal Name</label>
 <input type="text"  name="name" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
</div>

<div class="form-group">
 <label for="exampleInputEmail1">Meal Description</label>
 <input type="text"  name="description" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter meal description">
</div>

<div class="form-group">
 <label for="exampleInputEmail1">Meal price</label>
 <input type="number"  name="price" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter meal">
</div>


<div class="form-group">
 <label for="exampleInputEmail1">Meal Image</label>
 <input type="file"  name="meal_image" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter meal image">
</div>
<button type="submit" class="btn btn-primary"style="">Submit</button>

</form>
<a href='../CRUD_RESTURANTS/view_resturants.php' class='btn btn-danger m-r-1em'>View all resturants </a>

</div>
</div>
    </main>

<?php 
    include '../footer.php';
?>  






