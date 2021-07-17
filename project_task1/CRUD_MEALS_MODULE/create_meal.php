<?php require "dbconnection.php";
$rest_id=$_GET['id'];
//echo $rest_id;
$rest_id=filter_var($rest_id,FILTER_SANITIZE_NUMBER_INT);
$message="";
if(!filter_var($rest_id,FILTER_VALIDATE_INT))
{
  $_SESSION['message']="Invalid Id";
 header("location:../CRUD_RESTURANTS/view_resturants.php");
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

    $name_=CleanInputs($_POST['name']);
    $description=CleanInputs($_POST['description']);
    $price=CleanInputs($_POST['price']);

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

    if(!empty($price))
       {
        $price = filter_var($price,FILTER_SANITIZE_NUMBER_INT);

         if (!filter_var($price, FILTER_VALIDATE_INT))
          {
           $errorMessages['price'] = "price MUST BE number";
 
          }
       }
        else
        {
          $errorMessages['price'] = "Required";
        }
     // description Validation ...
     if(!empty($description))
     {
      // code ... 
       if(strlen($description) < 3)
         {
          $errorMessages['description'] = "description Length must be > 2 "; 
         }
    }
    else
    {
      $errorMessages['description'] = "Required";
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
              $errorMessages['meal_image'] = "meal_image is not uploaded ";
             }
  
         }
         else
         {
          $errorMessages['meal_image'] = "meal_image extension is not valid ";
        }
     }
      else
      {
        $errorMessages['meal_image'] = "meal_image  is required ";
      } 
 
 
   

////////////////////////////////////////////////////////////////////////////////////////
 
  if(count($errorMessages) == 0)
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
<title>add meal</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

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

</body>
</html>






