<?php
/**
 * Created by PhpStorm.
 * User: wilson
 * Date: 4/21/2015
 * Time: 9:22 PM
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../View/content/js/bootstrap.min.js"></script>
    <script src="../../View/content/js/bracket2.js"></script>
    <link rel="stylesheet" href="../gallery/gallery.css">
</head>
<body>
<div class="page">
    <div class="navbarBackgroundTile" id="picture">
        <img src="../../View/content/images/leaguePro.jpg" alt="banner">
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
                        <li class="hvr-sweep-to-right"><a href="../../Controller/games_brackets/halo.php">Halo</a></li>
                        <li class="hvr-sweep-to-right"><a href="../../Controller/games_brackets/counterStrike.php">Counter Strike</a></li>
                        <li class="hvr-sweep-to-right"><a href="../../Controller/games_brackets/leagueOfLegends.php">League Of Legends</a></li>
                        <li class="hvr-sweep-to-right"><a href="../../Controller/games_brackets/marioKart.php">Mario Kart</a></li>
                    </ul>
                </li>
                <li><a href="../../Controller/media/media.php" <?php if($pageTitle == 'Media') echo 'id = "currentPage"'; ?> class="hvr-underline-reveal">MEDIA <i class="ion-social-youtube"></i></a></li>
                <li><a href="../../Controller/general/news.php" <?php if($pageTitle == 'News') echo 'id = "currentPage"'; ?> class="hvr-underline-reveal">NEWS <i class="ion-ios-paper"></i></a></li>
                <li><a href="../../Controller/general/sponsors.php" <?php if($pageTitle == 'Sponsors') echo 'id = "currentPage"'; ?> class="hvr-underline-reveal">SPONSORS <i class="ion-cash"></i></a></li>
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

                                <?php if($user->hasPermission('admin')) { ?>
                                    <li><a class="userBarMenuHover" href="../../Controller/admin/admin.php">Admin</a></li>
                                <?php } ?>

                                <li><a class="userBarMenuHover" href="../../Controller/info/account.php">Account</a></li>
                                <li><a class="userBarMenuHover" href="../../View/login_register/logout.php">Log out</a></li>
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
    <div class="galleryPage">
        <!-- page itself -->
        <?php if(!isset($sideBar)){?>
            <div class="fullScreen">
                <?php require_once($page)?>
            </div>
        <?php }else{?>
            <div id="main" class="pageWidth">
                <?php require_once($page)?>
            </div>
        <?php }?>
    </div>
    <footer class="footerStyles  col-md-12">

        <hr>
        <p><center>2015 CMPS 285</center></p>
    </footer>
</div>
</body>
</html>