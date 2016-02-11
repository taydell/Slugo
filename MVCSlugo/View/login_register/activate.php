<?php
require_once '../../Config/core/init.php';


$user = new User();


if($user->isLoggedIn())
{
    Redirect::to('../../Controller/info/account.php');
}
else
{
    if(isset($_GET['email'], $_GET['email_code'],$_GET['id'])== true)
    {
        $email = trim($_GET['email']);
        $email_code = trim($_GET['email_code']);
        $id = trim($_GET['id']);

        //echo $user->activate($email, $email_code);

        if($user->user_active($id))
        {
            Redirect::to('../../Controller/login_register/login.php');
        }
        else
        {

            if($user->activate($email, $email_code)== false)
            {
                echo 'We are having problems activating your account... If the problem continues, contact us.';

            }
            else
            {
                echo'<center style="padding-top: 30px">Your email has been activated.</center>';
                //echo'<p> You will be redirected to the login page in 5 seconds...</p>';
            }
        }
    }
    else
    {
        Redirect::to('../../Controller/login_register/login.php');

    }
}

?>