<body id="home">
<header id="header">
        <nav id="main-nav" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo url('menu.php');?>"><img src="<?php echo url('images/logo.png');?>" alt="logo"></a>

                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll active"><a href="#home">Welcome <?php if (isset($_SESSION['user data'])){echo $_SESSION['user data']['user_name'];} else {}?></a></li> 
                        <!-- <li class="scroll"><a href="#about">Who We</a></li> -->
                        <li class=""><a href="search/search.php" class="btn btn-success" data-toggle="modal" data-target="#modalContactForm">Search</a></li>

                        <!-- <li class="scroll"><a href="search.php">Search</a> -->
                        <li class="scroll"><a href="<?php echo url('menu.php');?>">Menu</a></li>
                        <li class="scroll"><a href="<?php echo url('cart/view.php');?>">Cart</a></li>
                        <li class="scroll"><a href="<?php echo url('myOrders.php');?>"><?php if (isset($_SESSION['user data'])){echo $_SESSION['user data']['user_name'];} else {}?> Orders </a></li>
                        <?php
                        if(isset($_SESSION['user data'])){?>
                        <li class="scroll"><a href="<?php echo url('logout.php');?>">LogOut</a></li>
                        <?php }else {?>
                            <li class="scroll"><a href="<?php echo url('login.php');?>">LogIn</a></li>
                        <?php }?>
                        <!-- <li class="scroll"><a href="#our-team">Team</a></li> -->
                        <!-- <li class="scroll"><a href="#contact-us">Contact</a></li>                         -->
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->
