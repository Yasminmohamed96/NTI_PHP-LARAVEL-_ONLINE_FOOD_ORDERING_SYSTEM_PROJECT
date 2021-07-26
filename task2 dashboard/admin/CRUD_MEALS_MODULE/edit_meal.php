<?php 

 include '../helpers/functions.php';
include '../helpers/db.php';

    
   $id = $_GET['id'];
   $id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);
  
   $message = "";

   if(!filter_var($id,FILTER_VALIDATE_INT)){

    $_SESSION['message'] = "Invalid Id";

    header("Location: view_meal.php");
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

     //////////////////////////////////////////////////////////////////
     if(!Validator($price,1))
        {
          $Message[$$price] = $$price."is required";
        }
        $price=Sanitize($price,1);

       if (!Validator($price,3))
        {
          $Message[price] = "Invalid price must be a number";
        }
    
    ///////////////////////////////////////////////////////////////////////////////   
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
         $disPath=$_POST['old_file'];
         // $Message['meal_image'] = "meal_image  is required ";
        } 
   
   
     
      
          /////////////////////////////////////////////////////////////////////////////////////////////
      
     if(count($Message) == 0){

          // DB CODE... 
          $sql  = "update meals set meal_id='$id' , meal_name ='$name_' , meal_description ='$description' , meal_price ='$price',meal_image ='$disPath'  where meal_id =$id ";
     
          $op   =  mysqli_query($con,$sql);

          //mysqli_error($con);

       if($op)
       {
           $sql2="SELECT resturants_id FROM meals WHERE meal_id='$id'";
           $op2= mysqli_query($con,$sql2);
           $DATA=mysqli_fetch_assoc($op2);
           header("Location: view_meal.php?id=".$DATA[resturants_id]);
       }
       else{
          //echo mysqli_error($con);
        //$Message['sqlOperation'] = "Error in Your Sql Try Again";
        $Message[' DATABASE error']="insertion error ";
    }



     }else
     {

    // error messages TO A SESSION  
    $_SESSION['message'] = $Message;

      }
    }
   

    // Fetch single Row of Data .... 
     $sql = "select * from meals where meal_id = $id";
     $op = mysqli_query($con,$sql);
     $data = mysqli_fetch_assoc($op);

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
</div>
    </main>

<?php 
    include '../footer.php';
?>  



