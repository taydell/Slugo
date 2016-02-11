<?php
/**
 * Created by PhpStorm.
 * User: wilson
 * Date: 2/25/2015
 * Time: 1:05 PM
 */

?>

<div class="gamesStructure">
    <div style="border-radius: 5px; background-color: #ffffff; padding: 15px; color: #333333">
        <center><h3><span>SLUGO SITE Developers</span></h3></center>
        <p><center>THE SHIP!</center></p>
    </div>
    <!-- LOOP WILL PULL DATA FROM THE DATABASE FILE FOR THIS PAGE AND INSERT IT INTO THE PAGE -->
    <!-- TEMP VARIABLES -->

    <style>

        ul
        {
            padding-left: 0;
            margin-bottom: 0px;
        }

    </style>

    <?php
    $a = $DevelopersDataArray;
?>

    <!--<pre>

        <?php
       // print_r($a)
        ?>

    </pre>-->

    <?php
    $aboutDataArrayPosition = 0;
    while($aboutDataArrayPosition < $rows)
    {

        ?>

        <div class="accountContainer">
            <div class="accountImage">
                <img src="<?=$a[$aboutDataArrayPosition]['picture'];?>">
            </div>
            <div class="textContainer">
                <div class="text">
                    <ul style="padding-left:0;">
                        <li><?=$a[$aboutDataArrayPosition]['title']?></li>
                        <li style="font-size: 140%"><?=$a[$aboutDataArrayPosition]['name']?></li>
                    </ul>

                </div>
                <div class="textDrop">

                    <div class="panel panel-default" style="border: 1px solid transparent; background-color: #ebebe9;">
                        <div class="panel-heading" role="tab" id="headingOne" style=" color: #ffffff; border-radius: 5px">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#<?=$aboutDataArrayPosition?>" aria-expanded="true" aria-controls="<?=$aboutDataArrayPosition?>" style="text-decoration: none">
                                    <div style="width: 100%; height: 100%; background-color: cornflowerblue;; padding: 15px; border-radius: 5px">
                                        Bio
                                    </div>
                                </a>
                            </h4>
                        </div>
                        <div style="color: #333333; margin-top: 15px" id="<?=$aboutDataArrayPosition?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body" style=" text-align: center">
                                <div class="col-md-8" style="color: #333333;">
                                    <p style=" text-align: center"><?=$a[$aboutDataArrayPosition]['bio']?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php $aboutDataArrayPosition++; }?>
    <div style="border-radius: 5px; background-color: #ffffff; padding: 15px; color: #333333; margin-top: 15px">
        <center> <a style="color: #333333; text-decoration: none" href="../../Controller/info/info.php">ACM Officers</a></center>
        <center> <a style="color: #333333; text-decoration: none" href="../../Controller/contact/contactUs.php">Contact Us</a></center>
    </div>


</div>
