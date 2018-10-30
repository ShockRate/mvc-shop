<!-- navbar -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
 
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">EPAL Webstore</a>
        </div>
 
        <div class="navbar-collapse collapse">
            <?php if($loggedIn){ ?>
            <ul class="nav navbar-nav">
            
                <!-- highlight if $page_title has 'Products' word. -->
                <li <?php echo strpos($page_title, "pages")!==false ? "class='active'" : ""; ?>>
                    <a href="<?php echo BASE_URL; ?>pages">Αρχική - Δοκιμές</a>
                </li>
                <li <?php echo strpos($page_title, "order")!==false ? "class='active'" : ""; ?>>
                    <a href="<?php echo BASE_URL; ?>order">Παραγγελεία</a>
                </li>
                <?php if ($admin){ ?> 
                    <li <?php echo strpos($page_title, "login")!==false ? "class='active'" : ""; ?>>
                    <a href="<?php echo BASE_URL; ?>user">Χρήστες</a>
                </li>
                <?php } ?>
                
                <li <?php echo strpos($page_title, "customer")!==false ? "class='active'" : ""; ?>>
                    <a href="<?php echo BASE_URL; ?>customer">Πελάτες</a>
                </li>
                <li <?php echo $page_title=="Cart" ? "class='active'" : ""; ?> >
                    <a href="cart.php">
                        <!--later, we'll put a PHP code here that will count items in the cart -->
                        Cart2 <span class="badge" id="comparison-count">0</span>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a><?php echo isset($_SESSION['full_name'])?$_SESSION['full_name']:'' ?></a></li>
                <li><a href="<?php echo BASE_URL; ?>login/logoutuser"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>  
            <?php }else { ?>
                
            <!-- <li>
                <a href="register.php"> Register </a>
            </li>
            <li>
                <a href="login.php"> Login </a>
            </li> -->
            <?php } ?>
                
        
 
        </div><!--/.nav-collapse -->
 
    </div>
</div>
<!-- /navbar -->