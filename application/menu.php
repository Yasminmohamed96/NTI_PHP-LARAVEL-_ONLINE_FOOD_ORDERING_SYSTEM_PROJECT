
<?php
//ob_start();

include 'helpers/functions.php';
include 'helpers/db.php';
include 'header.php';
include 'nav.php'; 
?>
<section id="pricing">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Our Menu</h2>
                <p class="text-center wow fadeInDown">When you hungry Enjoy our meals    <br> Welcom.</p>
            </div>
            <?php 
                include '../task2_dashboard/admin/CRUD_MEALS_MODULE/rest_meal.php';   
                $add_to_cart=[];        
                while($data = mysqli_fetch_assoc($op)){
           ?>           
                             
            <div class="row"> 
			<div class="col-md-4 menuItem">     
                            <ul class="menu">
                                <li>
                                   <?php echo $data['meal_name'];
                                   echo'<br>';
                                   echo $data['resturants_name'];
                                   ?>    
                                    <div class="detail"><?php echo $data['meal_description'].'..';?> <span class="price"><?php echo 'price: '.$data['meal_price'];?></span></div>
                                    <?php
                                    $img_path='x'.$data['meal_image'];
                                    $nameArray = explode('./',$img_path);?>

                                    <form method ="post" action="cart/add.php" >
                                    <input hidden type="text" value="<?php echo $data['meal_id'];?>" name ="mealID"/>    
                                    
                                    <select name="quantity" > 
                                        <?php include 'cart/selectTag.php';?>
                                    </select>
                                    <input hidden type="text" value="<?php echo $data['meal_price'];?>" name ="price"/>    
                                    
                                    <button type="submit" class="btn btn-primary" >add</button>
                                    </form>
                                    <img src="<?="../task2_dashboard/admin/CRUD_MEALS_MODULE/".$nameArray[1]; ?>" style=" width:100px; width:100px; " />

                                </li>
                                
                            </ul>
                        </div>
                        
                        <?php }?>
			</div>
        </div>
    </section><!--/#pricing-->
  


    <?php 
include "footer.php";
?>


