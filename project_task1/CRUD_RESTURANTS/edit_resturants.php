<?php require 'dbConnection.php';
     $iid = isset($_GET['id']) ? $_GET['id'] : '';
   //$iid=$_GET['id'];
   $iid=filter_var($iid,FILTER_SANITIZE_NUMBER_INT);
  
   $message = "";

   if(!filter_var($iid,FILTER_VALIDATE_INT)){

    $_SESSION['message'] = "Invalid Id";

    header("Locattion: view_resturants.php");
   }



# Clean input ...
function CleanInputs($input){

  $input = trim($input);
  $input = stripcslashes($input);
  $input = htmlspecialchars($input);
 
  return $input;
 }
 
  $errorMessages = array();
  if($_SERVER['REQUEST_METHOD'] == "POST" ){
    $save_id=$iid; 
     $name_=CleanInputs($_POST['name']);
     $address=CleanInputs($_POST['address']);
     $url=CleanInputs($_POST['website_url']);
     $phone=CleanInputs($_POST['phone']);
     $category_name=CleanInputs($_POST['category_name']);
     $category_id=$_POST['category_id'];
 
 
      // Name Validation ...
      if(!empty($name_)){
        // code ... 
         if(strlen($name_) < 3)
           {
            $errorMessages['name'] = "name Length must be > 2 "; 
           }
      }
      else
      {
        $errorMessages['name'] = "Required";
      }
    
      // Name Validation ...
      if(!empty($category_name)){
       // code ... 
        if(strlen($category_name) < 3)
          {
           $errorMessages['category_name'] = "category_name Length must be > 2 "; 
          }
     }
     else
     {
       $errorMessages['category_name'] = "Required";
     }
 
      //phone vlidation
      if(!empty($phone)){
       // code ... 
     
        if(strlen(($phone)) < 11)
          {
           $errorMessages['phone'] = "phone Length must be > 11 "; 
          }
     }
     else
     {
       $errorMessages['phone'] = "Required";
     }
      // address Validation ...
      if(!empty($address))
      {
       // code ... 
        if(strlen($address) < 3)
          {
           $errorMessages['address'] = "address Length must be > 2 "; 
          }
     }
     else
     {
       $errorMessages['address'] = "Required";
     }
      if(!empty($url))
      { 
       if (!filter_var($url, FILTER_VALIDATE_URL)) 
       {
         $errorMessages['website_url'] = "website_url is not valid  url";
       }
      }
      else {
       $errorMessages['website_url'] = "Required";
           }
  
           
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
               $errorMessages['website_image'] = "website_image is not uploaded ";
              }
   
          }
          else
          {
           $errorMessages['website_image'] = "website_image extension is not valid ";
         }
      }
       else
       {
        $disPath=$_POST['old_file'];
         //$errorMessages['website_image'] = "website_image  is required ";
       } 
  
  
    
 
  ////////////////////////////////////////////////////////////////////////////////////////
   
    if(count($errorMessages) == 0)
    {
     
     $sql3="UPDATE resturants set resturants_name='$name_',resturants_address='$address',resturants_url='$url',resturants_phone='$phone',resturants_image='$disPath' where user_id=$save_id ";
     $op3=mysqli_query($con,$sql3);
     $sql4="UPDATE resturants_category set category_name='$category_name'where category_id=$category_id ";
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

  $sql="SELECT resturants.* ,resturants_category.* FROM resturants INNER JOIN resturants_category ON resturants.category__id=resturants_category.category_id WHERE resturants_id='$iid' ";
  $op = mysqli_query($con,$sql);
  $data = mysqli_fetch_assoc($op);
  echo mysqli_error($con);
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
<h2>Edit Resturant data </h2>
<form  method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  enctype ="multipart/form-data">

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


</body>
</html>


