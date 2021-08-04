<?php 

 include '../helpers/functions.php';
include '../helpers/db.php';

    
   $id = $_GET['id'];
   $id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);
  
   
   $Message =array();


   if(!filter_var($id,FILTER_VALIDATE_INT)){

    $Message['id']="Invalid Id";
    $_SESSION['message'] = $Message;

    header("Location: view_orders.php");
   }
  
   $Message = array();
   if($_SERVER['REQUEST_METHOD'] == "POST" ){
  
      $status=CleanInputs($_POST['status']);
      
      if (!Validator($status ,1))
      {
        $Message['status'] = "status is required";
      }
    if(!Validator($status ,2))
      {
        $Message['status'] = "Invalid status lenght";
      }
   /////////////////////////////////////////////////////////////////////////////////////////////
      
     if(count($Message) == 0){

          // DB CODE... 
          $sql  = "update user_orders set order_status='$status' where order_id =$id ";
     
          $op   =  mysqli_query($con,$sql);

          //mysqli_error($con);

       if($op)
       {
         
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
     $sql = "select * from user_orders where order_id = $id";
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
<h2>EDIT order status</h2>
<form  method="post"  action="edit_order_status.php?id=<?php echo $data['order_id'];?>"  enctype ="multipart/form-data">

<div class="form-group">
 <label for="exampleInputName">order status </label>
 <input type="text"  name="status" value="<?php echo $data['order_status'];?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="update status ">
</div>

<button type="submit" class="btn btn-primary">update</button>
</form>
</div>
<a href='view_orders.php' class='btn btn-danger m-r-1em'>view all meals</a>
</div>
    </main>

<?php 
    include '../footer.php';
?>  



