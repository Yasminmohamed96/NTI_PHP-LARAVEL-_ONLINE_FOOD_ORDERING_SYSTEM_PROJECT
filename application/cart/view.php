<?php 
 ob_start();

include '../helpers/functions.php';
include '../helpers/db.php';
include '../header.php';
include '../nav.php'; 
include '../helpers/checkLogin.php';

?>
<!-- //cart data info   -->
<section id="portfolio">
        <div class="container">
            <div class="section-header">
                
            <?php 
                if(isset($_SESSION['message'])){

                foreach($_SESSION['message'] as $key =>  $dataa){

                echo '* '.$key.' : '.$dataa.'<br>';
                }

                    unset($_SESSION['message']);
                }else{
                ?>

                <h2 class="section-title text-center wow fadeInDown">Cart</h2>
                <p class="text-center wow fadeInDown">Your Food choices <br> bon appétit.</p>
            </div>
            <?php 
                $sql = "SELECT meals.* , resturants.resturants_name from meals INNER JOIN resturants on meals.resturants_id=resturants.resturants_id    ";

                $op  = mysqli_query($con,$sql);
                $added_to_cart; 
               
                if (!isset($_SESSION['cart_data'])&& empty($_SESSION['cart_data']))
                {
                    echo "cart is empty";
                }
                else 
                {  
                  $added_to_cart=$_SESSION['cart_data'];       
                   while($data = mysqli_fetch_assoc($op))
                   {
                    for ($i=0; $i < count($added_to_cart) ; $i++) 
                    { 
                        if($data['meal_id']==$added_to_cart[$i][0])
                        {        
                            $item_count=$added_to_cart[$i][1];
           ?>           
                             
            <div class="row"> 
			<div class="col-md-4 menuItem">     
                            <ul class="menu">
                                <li>
                                   <?php echo $data['meal_name'];
                                   echo'<br>';
                                   echo $data['resturants_name'];
                                   ?>    
                                    <div class="detail"><?php echo $data['meal_name'].'..';?> 
                                        <span class="price"><?php echo "Price :".($data['meal_price']*$item_count);?></span>
                                        <span class="price1"> <?php echo "Quantity:" .$item_count.'..';?></span>

                                    </div>
                                    <?php
                                    $img_path='x'.$data['meal_image'];
                                    $nameArray = explode('./',$img_path);
                                    ?>
                                    <img src="<?php echo _url_('CRUD_MEALS_MODULE/'.$nameArray[1]);?>" style=" width:100px; width:100px; " />
                                    
                                    <a href='delete.php?id=<?php echo $i;?>' class='btn btn-danger m-r-1em'>delete </a>

                                    <form method ="post" action="edit.php" >
                                    <input hidden type="text" value="<?php echo (int)$i;?>" name ='index'/>    
                                    
                                    <select name="quantity" > 
                                        <?php include 'selectTag.php';?>
                                    </select>

                                    <button type="submit" class="btn btn-primary">edit</button>
                                    </form>
                                </li>
                                
                            </ul>

                        </div>
                        
                        <?php
                         }
                        }
                        }
                    }
                }
                 
                     ?>
                <a href='checkout.php?id="<?php echo $_SESSION['user data']['user_id']; ?>"' class='btn btn-danger m-r-1em'>checkout </a>

			</div>
        </div>
    </section><!--/#pricing-->
  