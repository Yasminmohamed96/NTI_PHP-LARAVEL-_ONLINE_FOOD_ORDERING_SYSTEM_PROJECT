<?php 
 ob_start();
include 'helpers/functions.php';
include 'helpers/db.php';
include 'header.php';
include 'nav.php';
?>


<section id="main-slider">
        <div class="owl-carousel owl-theme">

            
            <div class="item" style="background-image: url(images/slider/bg1.jpg);">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h2><span>Amzing</span> Food</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
             <div class="item" style="background-image: url(images/slider/bg2.jpg);">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h2><span>Lovely</span> Ambience</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
        </div><!--/.owl-carousel-->

    </section><!--/#main-slider-->

    <section id="hero-text" class="wow fadeIn animated">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <h2>Get Amazing and delicious dishes with us</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa semper aliquam quis mattis quam. Morbi vitae tortor tempus, placerat leo et, suscipit lectus. Phasellus ut euismod massa, eu eleifend ipsum. 
                    </p>
                </div>
                <div class="col-sm-3 text-right">
                    <a class="btn btn-primary btn-lg" href="#">Menu</a>
                </div>
            </div>
        </div>
    </section><!--/#hero-text-->

     










 <section id="about">
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Who We Are</h2>
                <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p>
            </div>

            <div class="row">
                <div class="col-sm-6 wow fadeInLeft">
                  <img class="img-responsive" src="images/about.png" alt="">
                </div>

                <div class="col-sm-6 wow fadeInRight">
                    <h3 class="column-title">We are an awesome group</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa semper aliquam quis mattis quam. Morbi vitae tortor tempus, placerat leo et, suscipit lectus. Phasellus ut euismod massa, eu eleifend ipsum.</p>

                    <p>Nulla eu neque commodo, dapibus dolor eget, dictum arcu. In nec purus eu tellus consequat ultricies. Donec feugiat tempor turpis, rutrum sagittis mi venenatis at. Sed molestie lorem a blandit congue. Ut pellentesque odio quis leo volutpat, vitae vulputate felis condimentum. </p>

					<p>Praesent vulputate fermentum lorem, id rhoncus sem vehicula eu. Quisque ullamcorper, orci adipiscing auctor viverra, velit arcu malesuada metus, in volutpat tellus sem at justo.</p>


                    <a class="btn btn-primary" href="#">Learn More</a>

                </div>
            </div>
        </div>
    </section><!--/#about-->

















    <section id="services" >
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">What We Offer</h2>
                <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p>
            </div>

            <div class="row">
                <div class="features">
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-heart"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Quick Coffee</h4>
                                <p>Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-compass"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Snacks</h4>
                                <p>Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-bell"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Break Fast</h4>
                                <p>Morbi vitae tortor tempus, placerat leo et, suscipit lectus. Phasellus ut euismod massa, eu eleifend ipsum.</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->
                
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="300ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-cube"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Ico Lunch</h4>
                                <p>Morbi vitae tortor tempus, placerat leo et, suscipit lectus. Phasellus ut euismod massa, eu eleifend ipsum.</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="400ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-yelp"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">ice Creams</h4>
                                <p>Morbi vitae tortor tempus, placerat leo et, suscipit lectus. Phasellus ut euismod massa, eu eleifend ipsum.</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="500ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-life-ring"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Dining</h4>
                                <p>Morbi vitae tortor tempus, placerat leo et, suscipit lectus. Phasellus ut euismod massa, eu eleifend ipsum.</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->
                </div>
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#services-->
















<section id="pricing">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Our Menu</h2>
                <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p>
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
  




<?php include "cart/view.php";?>


















   
    <section id="our-team">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Our Foodies</h2>
                <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/team/01.jpg" alt="">
                        </div>
                        <div class="team-info">
                            <h3>John Deo</h3>
                            <span>Manager</span>
                        </div>  
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="100ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/team/02.jpg" alt="">
                        </div>
                        <div class="team-info">
                            <h3>Mike Timobbs</h3>
                            <span>Sr Chef</span>
                        </div>  
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="200ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/team/03.jpg" alt="">
                        </div>
                        <div class="team-info">
                            <h3>Remo Silvaus</h3>
                            <span>Chef</span>
                        </div>  
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="300ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/team/04.jpg" alt="">
                        </div>
                        <div class="team-info">
                            <h3>Niscal Deon</h3>
                            <span>Chef</span>
                        </div>  
                    </div>
                </div>
            </div>

        </div>
    </section><!--/#our-team-->
















    
    <section id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">

                    <div id="carousel-testimonial" class="carousel slide text-center" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <p><img class="img-thumbnail" src="images/pic1.jpg" alt=""></p>
                                <h4>John Deo</h4> 
                                <p>Fusce non fermentum mi. Praesent vel lobortis elit. Nulla sodales, risus quis sollicitudin iaculis, felis dolor aliquet purus, eget elementum velit nunc eu dolor. Curabitur elit tellus.</p>
                            </div>
                            <div class="item">
                                <p><img class="img-thumbnail" src="images/pic2.jpg" alt=""></p>
                                <h4>Gramth Larry</h4> 
                                <p>Fusce non fermentum mi. Praesent vel lobortis elit. Nulla sodales, risus quis sollicitudin iaculis, felis dolor aliquet purus, eget elementum velit nunc eu dolor. Curabitur elit tellus, dictu.</p>
                            </div>
                        </div>

                        <!-- Controls -->
                        <div class="btns">
                            <a class="btn btn-primary btn-sm" href="#carousel-testimonial" role="button" data-slide="prev">
                                <span class="fa fa-angle-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="btn btn-primary btn-sm" href="#carousel-testimonial" role="button" data-slide="next">
                                <span class="fa fa-angle-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#testimonial-->













    
    <section id="contact-us">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Contact Us</h2>
                <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p>
            </div>
        </div>
    </section><!--/#contact-us-->


    <section id="contact">
        
        <div class="container-wrapper">
            <div class="container contact-info">
                <div class="row">
				  <div class="col-sm-4 col-md-4">
                        <div class="contact-form">
                            <h3>Contact Info</h3>

                            <address>
                              <strong>little Heart Restaurant.</strong><br>
                              12345 NewYork, Street 125<br>
                              United States 94107<br>
                              <abbr title="Phone">P:</abbr> (123) 456-7890
                            </address>
					</div></div>
                    <div class="col-sm-8 col-md-8">                      
						<div class="contact-form">											
						  
		<!--NOTE: Update your email Id in "contact_me.php" file in order to receive emails from your contact form-->
		<form name="sentMessage" id="contactForm"  novalidate>
		<h3>Contact Form</h3>
		<div class="control-group">
		<div class="controls">
		<input type="text" class="form-control" 
		placeholder="Full Name" id="name" required
		data-validation-required-message="Please enter your name" />
		<p class="help-block"></p>
		</div>
		</div> 	
		<div class="control-group">
		<div class="controls">
		<input type="email" class="form-control" placeholder="Email" 
		id="email" required
		data-validation-required-message="Please enter your email" />
		</div>
		</div> 	

		<div class="control-group">
		<div class="controls">
		<textarea rows="10" cols="100" class="form-control" 
		placeholder="Message" id="message" required
		data-validation-required-message="Please enter your message" minlength="5" 
		data-validation-minlength-message="Min 5 characters" 
		maxlength="999" style="resize:none"></textarea>
		</div>
		</div> 		 
		<div id="success"> </div> <!-- For success/fail messages -->
		<button type="submit" class="btn btn-primary pull-right">Send</button><br />
		</form>

							 					
						</div>
                    </div>
                </div>
            </div>
        </div>
<div id="google-map" style="height:400px" data-latitude="40.7141667" data-longitude="-74.00638891"></div>   
 
   </section><!--/#bottom-->


<?php 
include "footer.php";
?>

