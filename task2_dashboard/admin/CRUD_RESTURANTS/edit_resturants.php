<?php 
include '../helpers/functions.php';
include '../helpers/db.php';
     $iid = $_GET['id'];
   //$iid=$_GET['id'];
   $iid=filter_var($iid,FILTER_SANITIZE_NUMBER_INT);
  
    
  $Message = array();

   if(!filter_var($iid,FILTER_VALIDATE_INT)){
    $Message['id']= "Invalid Id";
    $_SESSION['message'] = $Message;

    header("Locattion: view_resturants.php");
   }

  if($_SERVER['REQUEST_METHOD'] == "POST" ){
    $save_id=$iid; 
     $name_=CleanInputs($_POST['name']);
     $address=CleanInputs($_POST['address']);
     $url=CleanInputs($_POST['website_url']);
     $phone=CleanInputs($_POST['phone']);
     $category_name=CleanInputs($_POST['category_name']);
     $category_id=$_POST['category_id'];
 
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
      if(!empty($_FILES['website_image']['name']) && isset($_FILES['website_image']['name']) )
      {
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
                 unlink($_POST['old_file']);
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
        $disPath=$_POST['old_file'];
         //$Message['website_image'] = "website_image  is required ";
       } 
  
  
    
 
  ////////////////////////////////////////////////////////////////////////////////////////
   
    if(count($Message) == 0)
    {
     
     $sql3="UPDATE resturants
      SET resturants_name='$name_',resturants_address='$address',resturants_url='$url',resturants_phone='$phone',resturants_image='$disPath'
      WHERE resturants_id= '$iid' ";
     $op3=mysqli_query($con,$sql3);
     $sql4="UPDATE resturants_category set category_name='$category_name'where category_id=$category_id ";
     $op4=mysqli_query($con,$sql4);
     header("location:view_resturants.php");
    }
    else
      {
  
    // error messages TO A SESSION  
    $_SESSION['message'] = $Message;
      }
    }

  $sql="SELECT resturants.* ,resturants_category.* FROM resturants INNER JOIN resturants_category ON resturants.category__id=resturants_category.category_id WHERE resturants_id='$iid' ";
  $op = mysqli_query($con,$sql);
  $data = mysqli_fetch_assoc($op);
  // var_dump($data);
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
<h2>Edit Resturant data </h2>
<form  method="post"  action="edit_resturants.php?id=<?php echo $data['resturants_id'];?>"  enctype ="multipart/form-data">

<div class="form-group">
 <label for="exampleInputEmail1">Resturant Name</label>
 <input type="text" value="<?php echo $data['resturants_name']?>"  name="name" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
</div>

<div class="form-group">
 <label for="exampleInputEmail1">Resturant Address</label>
 <input type="text" value="<?php echo $data['resturants_address']?>"  name="address" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter resturant address">
</div>

<div class="form-group">
 <label for="exampleInputEmail1">Resturant Phone</label>
 <input type="number" value="<?php echo $data['resturants_phone']?>"  name="phone" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter resturants_phone">
</div>

<div class="form-group">
 <label for="exampleInputEmail1">Resturants URL</label>
 <input type="url" value="<?php echo $data['resturants_url']?>"   name="website_url" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Resturants URL">
</div>

<div class="form-group">
 <input type="hidden"  name="category_id" value="<?php echo $data['category_id'];?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
 </div>

<div class="form-group">
 <label for="exampleInputEmail1">Resturant Category</label>
 <input type="text" value="<?php echo $data['category_name']?>"  name="category_name" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Category Name">
</div>

<div class="form-group">
 <label for="exampleInputEmail1">Resturant Image</label>
 <img src="<?=$data['resturants_image']; ?>"style=" width:100px; width:100px; " />
 <input hidden name ="old_file" value="<?=$data['resturants_image']; ?>" >
 <input type="file"  name="website_image" value="<?php echo $data['resturants_image']?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter website image">
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

