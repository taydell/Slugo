<?php
require_once '../../Config/core/init.php';

if(Session::exists('home'))
{
    echo '<p>' . Session::flash('home') . '</p>';
}

$user = new User();

if($user->isLoggedIn())
{
    ?>
    <style>
        .accountContainer
        {
            width: 600px;
            min-height: 200px;
            height: auto;
            background-color: #ffffff;
            border-radius: 5px;
            margin-top: 15px;
            padding: 10px;
            margin-left: auto;
            margin-right: auto;
        }
        .accountImage
        {
            display: inline-block;
            height:inherit;
            vertical-align: top;
        }

        .accountImage > img
        {
            max-height: 200px;
            max-width: 200px;
            overflow: hidden;
            object-fit: cover;
            border-radius: 5px;

        }

        .textContainer
        {
            text-align: center;
            display: inline-block;
            padding-top: 10px;
            padding-left: 5px;
            padding-right: 5px;
            height: auto;
            width: 375px;
            /*background: green;*/
            /*border: 1px solid green;*/
            vertical-align: middle;
        }
        .text
        {
            color: #333333;
            background-color: #ffffff;
            border-radius: 0px;

        }
        .textDrop
        {
            color: #ffffff;
            background-color: #ffffff;
        }
        .btn
        {
            color: #333333;
            border: solid #333333 thin;
        }
        .btn:hover

        {
            color: #ffffff;
            border: solid #333333 thin;
        }
        ul
        {
            padding-left: 0;
            margin-bottom: 0px;
        }
        .btn-default
        {
            background: darkred none;
            color: #ffffff;

        }
        .btn .btn-block
        {
            margin-bottom: 0px;
        }
        .well
        {
            border-radius: 0px;
            color: #333333;
        }
        .panel > .panel-heading
        {
            background-image: none;
            background-color: cornflowerblue;
            color: white;
        }
    </style>
    <!--<pre>
    <?php

    //print_r($userDataArray);

    //print_r($user);

    ?>
    </pre>-->

    <div class="gamesStructure col-md-12">
        <div class="col-md-3" style="border-radius: 5px; background-color: #ffffff; padding: 15px; color: #333333; margin-bottom: 15px; width: auto">
            <div class="">
                <form action ="" method="post">
                    <p>Hello, <a style="color: #333333" href="../../Controller/info/profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->first_name); ?></a>!</p>
                    <div class="accountImage">
                        <img src="../../View/content/accountImages/<?php echo escape($user->data()->avatar); ?>">
                    </div>
                    <!-- ../views/updateDetails.php -->
                    <a href="../../Controller/info/updateDetails.php" style="background-color: transparent; text-decoration: none">
                        <div class="" style="text-align: center; background-color: cornflowerblue; padding: 10px; border-radius: 5px; color: #ffffff; margin-top: 15px; text-decoration: none">
                            Update details
                        </div>
                    </a>

                    <a href="../../Controller/recovery/changePass.php" style="background-color: transparent; text-decoration: none">
                        <div class="" style="text-align: center; background-color: cornflowerblue; padding: 10px; border-radius: 5px; color: #ffffff; margin-top: 15px; text-decoration: none">
                            Change password
                        </div>
                    </a>
                </form>
            </div>
        </div>
        <div class="col-md-6" style="border-radius: 5px; background-color: #ffffff; padding: 15px; color: #333333; margin-bottom: 15px; margin-left: 15px; text-align: center">
            <p>You have not posted anything.</p>
        </div>
    </div>
    <?php
    //if($user->user_active($user->data()->id))
    //{

    //}
    if($user ->hasPermission('admin'))
    {
        echo ' ';
    }
}
else
{
    echo '<p>You need to <a href="../../Controller/login_register/login.php">log in</a>  or <a href="../../Controller/login_register/register.php">register</a></p>';
}

