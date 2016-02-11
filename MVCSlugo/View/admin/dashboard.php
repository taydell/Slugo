<?php
/**
 * Created by PhpStorm.
 * User: wilson
 * Date: 2/25/2015
 * Time: 5:11 PM
 */

$row = 10;
$count = 0;

$user = new User();

if($user->isLoggedIn())
{

    if($user->hasPermission('admin'))
    {
        include_once('../../Config/classes/DB.php');

        while($count < $row)
        {

            ?>
            <div class="dashboardContainer col-md-12">

                <div class="tile">
                    <a href="admin_template.html">
                        <div class="deleteButton">

                        </div>
                    </a>
                    <div class="gameImage">
                        <img src="<?php $gameImage ?>">
                    </div>
                </div>
            </div>

            <?php

            $count++;
        }


    }
    else
    {
        Redirect::to('../../Controller/general/home.php');
    }

}
else
{
    Redirect::to('../../Controller/general/home.php');
}