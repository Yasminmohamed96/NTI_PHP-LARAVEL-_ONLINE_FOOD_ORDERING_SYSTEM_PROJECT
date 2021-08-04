<!-- <div class="modal-body">
<div id="result"></div>
</div> -->

<?php
//ob_start();

include '../helpers/functions.php';
include '../helpers/db.php';
include '../header.php';
include '../nav.php'; 
?>
<section id="our-team">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Search Result</h2>
                <p class="text-center wow fadeInDown">When you hungry Enjoy our meals    <br> Welcom.</p>
            </div>
            <?php 
            $key=CleanInputs($_POST['search_data']);
            echo $key;
            $sql = "SELECT * FROM meals WHERE meal_id LIKE '%$key%' or meal_name LIKE '%$key%'or meal_price LIKE '%$key%'";
            $op = mysqli_query($con,$sql);
            //var_dump($op);
    
            if($op)
            {
             
                $sql2 = "SELECT resturants_name ,resturants_id FROM resturants WHERE resturants_name LIKE '%$key%'";
                 $op2 = mysqli_query($con,$sql2);
                 
                 
                 if($op2)
                 {
                    $result = mysqli_fetch_assoc($op2);
                    $r_id=$result['resturants_id'];
                    $sql3 = "SELECT * FROM meals WHERE resturants_id ='$r_id'";
                    $op = mysqli_query($con, $sql3);
                    
                            
                 }
            }
                $add_to_cart=[];        
                while($data = mysqli_fetch_assoc($op))
                {
                    $r_id=$data['resturants_id'];
                    $sql4 = "SELECT resturants_name FROM resturants WHERE resturants_id ='$r_id'";
                    $op4 = mysqli_query($con, $sql4);
                    $data_rest_name = mysqli_fetch_assoc($op4);
           ?>           
                             
            <div class="row"> 
			<div class="col-md-4 menuItem">     
                            <ul class="menu">
                                <li>
                                   <?php echo $data['meal_name'];
                                   echo'<br>';
                                   if (isset($op2)){
                                    echo $data_rest_name['resturants_name'];

                                   }
                                   else
                                   {
                                    echo $data['resturants_name'];
                                   }
                                   ?>    
                                    <div class="detail"><?php echo $data['meal_description'].'..';?> <span class="price"><?php echo 'price: '.$data['meal_price'];?></span></div>
                                    <?php
                                    $img_path='x'.$data['meal_image'];
                                    $nameArray = explode('./',$img_path);?>

                                    <form method ="post" action="<?php echo url ('cart/add.php');?>" >
                                    <input hidden type="text" value="<?php echo $data['meal_id'];?>" name ="mealID"/> 
                                    <select name="quantity" > 
                                        <?php 
                                        include "../cart/selectTag.php";
                                        ?>
                                    </select>
                                    <input hidden type="text" value="<?php echo $data['meal_price'];?>" name ="price"/>    
                                    <button type="submit" class="btn btn-primary" >add</button>
                                    </form>
                                    <img src="<?php echo _url_ ('CRUD_MEALS_MODULE/').$nameArray[1]; ?>" style=" width:100px; width:100px; " />

                                </li>
                                
                            </ul>
                        </div>
                        
                        <?php }?>
			</div>
        </div>
    </section><!--/#pricing-->
  


<?php 
include "../footer.php";
?>


