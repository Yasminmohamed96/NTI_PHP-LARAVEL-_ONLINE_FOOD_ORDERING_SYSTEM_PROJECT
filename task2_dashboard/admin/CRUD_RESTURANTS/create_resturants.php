<?php 
include '../helpers/functions.php';
include '../helpers/db.php';

$Message = array();
 if($_SERVER['REQUEST_METHOD'] == "POST" ){

    $name_=CleanInputs($_POST['name']);
    $address=CleanInputs($_POST['address']);
    $url=CleanInputs($_POST['website_url']);
    $phone=CleanInputs($_POST['phone']);

    $category_name=CleanInputs($_POST['category_name']);


      if (!Validator($name_,1))
       {
         $Message['name'] = "name is required";
       }
     if(!Validator($name_,2))
       {
         $Message['name'] = "Invalid name lenght";
       }
   //////////////////////////////////////////////////////////////////////////////////////////
       if (!Validator($address,1))
       {
         $Message['address'] = "address is required";
       }
     if(!Validator($address,2))
       {
         $Message['address'] = "Invalid address lenght";
       }
       ////////////////////////////////////////////////////////////////////////////////
       if (!Validator($category_name,1))
       {
         $Message['category_name'] = "category_name is required";
       }
     if(!Validator($category_name,2))
       {
         $Message['category_name'] = "Invalid category_name lenght";
       }

   ///////////////////////////////////////////////////////////////////////////////////////////
  
   if (!Validator($phone,1))
   {
     $Message['phone'] = "phone  is required";
   }    

   $phone=Sanitize($phone,1);

   if (!Validator($phone,3,10))
   {
     $Message['phone'] = "phone lenght is not valid";
   }
  /////////////////////////////////////////////////////////////////////////////////////////////////  
  if (!Validator($url,1))
   {
     $Message['url'] = "url  is required";
   }    
   if (!Validator($url,5))
   {
     $Message['url'] = "url is not valid";
   }
   //////////////////////////////////////////////////////////////////////////////////////////////////      
     if(!empty($_FILES['website_image']['name']) && isset($_FILES['website_image']['name']) ){
         // CODE ... 
       $tmp_path = $_FILES['website_image']['tmp_name'];
       $name     = $_FILES['website_image']['name'];
       $size     = $_FILES['website_image']['size'];
       $type     = $_FILES['website_image']['type'];
         
  
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
              $Message['website_image'] = "website_image is not uploaded ";
             }
  
         }
         else
         {
          $Message['website_image'] = "website_image extension is not valid ";
        }
     }
      else
      {
        $Message['website_image'] = "website_image  is required ";
      } 
 
 
   

////////////////////////////////////////////////////////////////////////////////////////
 
  if(count($Message) == 0)
  {
    //insert all resturants data except category__id. will insert category first to get its id  
    $sql="insert into resturants (resturants_name,resturants_address,resturants_url,resturants_phone,resturants_image) values ('$name_','$address','$url','$phone','$disPath')";
    $op=mysqli_query($con,$sql);
    if ($op)
     {
    //insert all resturants category data 
     $sql2="insert into resturants_category (category_name) values ('$category_name')";
    //retrieve the last id in the address table to put in user table as his address id 
     if (mysqli_query($con, $sql2)) 
     { $last_id_categoryDB = mysqli_insert_id($con);}
    // to update the user data and add address id 
     $sql3="UPDATE resturants SET category__id =$last_id_categoryDB WHERE resturants_url='$url'";
     $op3=mysqli_query($con,$sql3);
      }
    else
      {
        $Message['INSERTION TO DATABASE']="insertion error ";
      }
  
  }
  else
  {

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
<h2>Add New Resturant </h2>
<form  method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  enctype ="multipart/form-data">

<div class="form-group">
 <label for="exampleInputEmail1">Resturant Name</label>
 <input type="text"  name="name" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
</div>

<div class="form-group">
 <label for="exampleInputEmail1">Resturant Address</label>
 <input type="text"  name="address" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter resturant address">
</div>

<div class="form-group">
 <label for="exampleInputEmail1">Resturant Phone</label>
 <input type="number"  name="phone" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter resturants_phone">
</div>

<div class="form-group">
 <label for="exampleInputEmail1">Resturants URL</label>
 <input type="url"  name="website_url" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Resturants URL">
</div>

<div class="form-group">
 <label for="exampleInputEmail1">Resturant Category</label>
 <input type="text"  name="category_name" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Category Name">
</div>

<div class="form-group">
 <label for="exampleInputEmail1">Resturant Image</label>
 <input type="file"  name="website_image" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter website image">
</div>
<button type="submit" class="btn btn-primary"style="">Submit</button>

</form>
<a href='view_resturants.php' class='btn btn-danger m-r-1em'>View all resturants </a>

</div>

</div>
    </main>

<?php 
    include '../footer.php';
?>  







