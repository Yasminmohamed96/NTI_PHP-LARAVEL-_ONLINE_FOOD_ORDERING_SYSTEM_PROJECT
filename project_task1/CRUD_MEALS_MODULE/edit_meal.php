<?php 

   require 'dbConnection.php';
    
   $id = $_GET['id'];
   $id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);
  
   $message = "";

   if(!filter_var($id,FILTER_VALIDATE_INT)){

    $_SESSION['message'] = "Invalid Id";

    header("Locattion: view_meal.php");
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
                  $old=$_POST['old_file'];
                  unlink($old);
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
         $disPath=$_POST['old_file'];
         // $errorMessages['meal_image'] = "meal_image  is required ";
        } 
   
   
     
      
          /////////////////////////////////////////////////////////////////////////////////////////////
      
     if(count($errorMessages) == 0){

          // DB CODE... 
          $sql  = "update meals set meal_id='$id' , meal_name ='$name_' , meal_description ='$description' , meal_price ='$price',meal_image ='$disPath'  where meal_id =$id ";
     
          $op   =  mysqli_query($con,$sql);

          //mysqli_error($con);

       if($op)
       {
           $_SESSION['message'] = "Record Updated";
            header("Location: view_meal.php");
       }
       else{
          echo mysqli_error($con);
        $errorMessages['sqlOperation'] = "Error in Your Sql Try Again";
    }



     }else{

     // print error messages 
     foreach($errorMessages as $key => $value){

        echo '* '.$key.' : '.$value.'<br>';
         }
       }
    }
   

    // Fetch single Row of Data .... 
     $sql = "select * from meals where meal_id = $id";
     $op = mysqli_query($con,$sql);
     $data = mysqli_fetch_assoc($op);
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
<h2>EDIT meal</h2>
<form  method="post"  action="edit_meal.php?id=<?php echo $data['meal_id'];?>"  enctype ="multipart/form-data">

<div class="form-group">
 <label for="exampleInputEmail1">meal name</label>
 <input type="text"  name="name" value="<?php echo $data['meal_name'];?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
</div>

<div class="form-group">
 <label for="exampleInputEmail1">meal description</label>
 <input type="text"  name="description" value="<?php echo $data['meal_description'];?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
</div>

<div class="form-group">
 <label for="exampleInputEmail1">meal price</label>
 <input type="number"  name="price" value="<?php echo $data['meal_price'];?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
</div>

<div class="form-group">
 <label for="exampleInputEmail1">meal image</label>
 <img src="<?=$data['meal_image']; ?>"style=" width:100px; width:100px; " />
 <input hidden name ="old_file" value="<?=$data['meal_image']; ?>" >
 <input type="file"  name="meal_image" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
</div>
<button type="submit" class="btn btn-primary">update</button>
</form>
</div>
<a href='view_meal.php?id=<?php echo $data['resturants_id'];?>' class='btn btn-danger m-r-1em'>view all meals</a>
</body>
</html>


