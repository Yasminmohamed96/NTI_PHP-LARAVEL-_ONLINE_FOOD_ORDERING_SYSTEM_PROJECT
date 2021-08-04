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

   


<?//include 'services.php';?>
<?//include 'pricing.php';?>




    











<?php
// include "cart/view.php";?>












<?php 
include "footer.php";
?>

