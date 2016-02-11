<?php
require_once '../../Config/core/init.php';


$user = new User();


if($user->isLoggedIn())
{
    Redirect::to('../../Controller/general/home.php');
}
else
{
    echo '<center><p style="padding-top: 30px"> A verification email has been sent to your email address.</p></center>';


    // header( "refresh:3;url=../views/login.php" );

}

?>