<?php
/**
 * Created by PhpStorm.
 * User: wilson
 * Date: 3/17/2015
 * Time: 1:39 AM
 */
$user = new User();
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>SLUGO - <?=$pageTitle ?> </title>

    <!-- links must be from root directory
     when the template is called it gets added to the view that called it
and files start getting referenced from there-->

    <link rel="stylesheet" href="../../View/content/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../View/content/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../../View/content/css/slugoNEW.css">
    <link rel="stylesheet" href="../../View/content/css/hover-min.css">
    <link rel="stylesheet" href="../../View/content/fancyBox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <link rel="stylesheet" href="../../View/content/fancyBox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
    <link rel="stylesheet" href="../../View/content/fancyBox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
    <link rel="stylesheet" href="../../View/shared/gallery/gallery.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="../../View/content/fancyBox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
    <script type="text/javascript" src="../../View/content/fancyBox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    <script type="text/javascript" src="../../View/content/fancyBox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript" src="../../View/content/fancyBox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
    <script type="text/javascript" src="../../View/content/fancyBox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>



</head>
<body>
<div class="page">
    <div class="navbarBackgroundTile" id="picture">

        <?php

        if($pageTitle == 'Account')
        {
            ?>
            <img src="../../View/content/accountBanners/<?php echo escape($user->data()->account_banner); ?>" alt="banner">
        <?php
        }else
        {
            ?>
            <img src="../../View/content/images/leaguePro.jpg" alt="banner">
        <?php
        }

        ?>


    </div>
    <nav id="navbarPOS" class="navbar navbarBackColor navbar-fixed-top">
        <div class="navbarReposition">
            <header class="">
                <!-- references must be called from root -->
                <a class="navbar-brand hvr-grow" href="../../Controller/general/home.php" id="logo">SLUGO</a>
            </header>
            <ul class="nav navbar-nav" id="links">
                <li><a href="../../Controller/games_brackets/games.php" <?php if($pageTitle == 'Games') echo 'id = "currentPage"'; ?>  class="hvr-underline-reveal">GAMES <i class="ion-ios-game-controller-b"></i></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"<?php if($pageTitle == 'Brackets') echo 'id = "currentPage"';?> >BRACKETS</a>
                    <ul class="dropdown-menu">
                        <li class="hvr-sweep-to-right"><a href="../../Controller/games_brackets/marioKart.php">Mario Kart</a></li>
                        <li class="hvr-sweep-to-right"><a href="../../Controller/games_brackets/halo.php">Halo</a></li>
                        <li class="hvr-sweep-to-right"><a href="../../Controller/games_brackets/leagueOfLegends.php">League Of Legends</a></li>
                        <li class="hvr-sweep-to-right"><a href="../../Controller/games_brackets/counterStrike.php">Counter Strike</a></li>
                    </ul>
                </li>
                <li><a href="../../Controller/media/media.php" <?php if($pageTitle == 'Media') echo 'id = "currentPage"'; ?> class="hvr-underline-reveal">MEDIA <i class="ion-social-youtube"></i></a></li>
                <!--<li><a href="../views/forums.php" class="hvr-underline-reveal">FORUMS <i class="ion-android-chat"></i></a></li>-->
                <li><a href="../../Controller/general/faq.php" <?php if($pageTitle == 'FAQ') echo 'id = "currentPage"'; ?>class="hvr-underline-reveal">FAQ <i class="ion-help-circled"></i></a></li>
                <li><a href="../../Controller/info/info.php" <?php if($pageTitle == 'Info') echo 'id = "currentPage"'; ?>class="hvr-underline-reveal">INFO <i class="ion-information-circled"></i></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right navbarUser " id="selu">
                <li class ="dropdown navbarUserName">
                    <?php if($user->isLoggedIn()){?>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                        <?php echo escape($user->data()->username); ?>
                        <ul class="dropdown-menu" role="menu">

                            <?php
                            if($user ->hasPermission('admin'))
                            { ?>
                                <li class="hvr-sweep-to-right"><a class="userBarMenuHover" href="../../Controller/admin/admin.php">Admin</a></li>
                           <?php } ?>


                            <li class="hvr-sweep-to-right"><a class="userBarMenuHover" href="../../Controller/info/account.php">Account</a></li>
                            <li class="hvr-sweep-to-right"><a class="userBarMenuHover" href="../../View/login_register/logout.php">Log out</a></li>
                        </ul>
                    </a>
                <?php }else{ ?>

                    <li><a href="../../Controller/login_register/login.php" class="loginUser hvr-underline-reveal" id="login">Login</a></li>
                    <li><a href="../../Controller/login_register/register.php" class="hvr-underline-reveal" id="login">Register</a></li>
                <?php } ?>
                </li>

            </ul>

        </div>
    </nav>
    <div class="contentPage">
        <!-- page itself -->
        <?php if(!isset($sideBar)){?>
            <div id="main" class="col-md-8 col-md-offset-2">
                <?php require_once($page)?>
            </div>
        <?php }else{?>
            <div id="main" class="pageWidth col-md-8">
                <?php require_once($page)?>
            </div>
        <?php }?>
    </div>
    <footer class="footerStyles  col-md-12">

        <hr>
        <p><center>2015 CMPS 285</center></p>
    </footer>
</div>
<script src="../../View/content/js/bootstrap.min.js"></script>

</body>
</html>