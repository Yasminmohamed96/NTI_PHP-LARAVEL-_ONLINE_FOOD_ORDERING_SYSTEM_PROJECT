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

    $name_=CleanInputs($_POST['name']);
    $address=CleanInputs($_POST['address']);
    $url=CleanInputs($_POST['website_url']);
    $phone=CleanInputs($_POST['phone']);

    $category_name=CleanInputs($_POST['category_name']);


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
        $errorMessages['website_image'] = "website_image  is required ";
      } 
 
 
   

////////////////////////////////////////////////////////////////////////////////////////
 
  if(count($errorMessages) == 0)
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

</body>
</html>






