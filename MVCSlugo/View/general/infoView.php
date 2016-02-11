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
    <center><h3><span>ACM</span></h3></center>
    <p><center>Current ACM Officers.</center></p>
</div>
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
            height: 200px;
            width: 200px;
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
        .panel > .panel-heading {
            background-image: none;
            background-color: cornflowerblue;
            color: white;

        }
    </style>
    <!-- LOOP WILL PULL DATA FROM THE DATABASE FILE FOR THIS PAGE AND INSERT IT INTO THE PAGE -->
    <!-- TEMP VARIABLES -->

    <!--<pre>-->

            <?php
          /*  function moveElement($a, $i,$j)
            {
                $tmp = $a[$i];
                if($i>$j)
                {
                    for($k = $i;$k>$j;$k--)
                    {
                        $a[$k] = $a[$k-1];
                    }
                }
                else
                {
                    for($k = $i; $k<$j; $k++)
                    {
                        $a[$k]=$a[$k+1];
                    }
                }
                $a[$j]=$tmp;
                return $a;
            }*/
            function moveElement($a, $i,$j)
            {
                $tmp = $a[$i];

                        $a[$i] = $a[$j];

                $a[$j]=$tmp;
                return $a;
            }

            $a = $aboutDataArray;


            function num($title)
            {
                $num='';
                $President = "President";
                $VP = "Vice President";
                $Secretary = "Secretary";
                $Treasurer = "Treasurer";
                if($title==$President)
                {
                    $num = 0;

                }
                elseif($title== $VP)
                {
                    $num = 1;
                }
                elseif($title == $Secretary)
                {
                    $num= 2;
                }
                elseif($title==$Treasurer)
                {
                    $num= 3;
                }
                return $num;
            }

            //print_r($a);

            for($i=0; $i < $rows;$i++)
            {
                $j = $i;
                while($j >0 && num($a[$j-1]['title'])>num($a[$j]['title']))
                {
                    $a = moveElement($a,$j,($j-1));
                    $j = $j-1;
                }
            }

           //print_r($a);
            ?>

   <!--</pre>-->

    <?php

    $aboutDataArrayPosition = 0;

    while($aboutDataArrayPosition < $rows)
    {
    if ($aboutDataArray[$aboutDataArrayPosition]['active'] == 1)
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

                    <div class="panel panel-default" style="border: 1px solid transparent; background-color: #ebebe9">
                        <div class="panel-heading" role="tab" id="headingOne" style=" color: #ffffff; border-radius: 5px">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#<?=$aboutDataArrayPosition?>" aria-expanded="true" aria-controls="<?=$aboutDataArrayPosition?>" style="text-decoration: none">
                                    <div style="width: 100%; height: 100%; background-color: cornflowerblue;; padding: 15px; border-radius: 5px;">
                                        Bio
                                    </div>
                                </a>
                            </h4>
                        </div>
                        <div style="color: #333333; margin-top: 15px" id="<?=$aboutDataArrayPosition?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <div class="col-md-8" style="color: #333333;">
                                    <p style=" text-align: center"><?=$a[$aboutDataArrayPosition]['bio']?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <?php }$aboutDataArrayPosition++; }?>
<div style="border-radius: 5px; background-color: #ffffff; padding: 15px; color: #333333; margin-top: 15px">
    <center> <a style="color: #333333; text-decoration: none" href="../../Controller/general/developers.php">SLUGO Developers</a></center>
    <center> <a style="color: #333333; text-decoration: none" href="../../Controller/contact/contactUs.php">Contact Us</a></center>
</div>
</div>
