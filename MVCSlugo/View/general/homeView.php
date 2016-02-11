
<?php
/**
 * Created by PhpStorm.
 * User: wilson
 * Date: 2/24/2015
 * Time: 11:58 PM
 */

/*// work in progress possibly?
function roll()
{
    return rand(0,3);
}

function match()
{

    $num1 = roll();
    $num2 = roll();
    $num3 = roll();

    if($num1==$num2)
    {
        $num2= roll();
    }
    if($num1==$num3)
    {
        $num3=roll();
    }
    if($num2==$num3)
    {
        $num3 = roll();
    }
    if($num1==$num2||$num1==$num3||$num2==$num3)
    {
        match();
    }
    else
    {
        $myArray = array($num1,$num2,$num3);
        return $myArray;
    }

   return "";

the password is querty


}*/
?>


<div class="gamesStructure col-md-12">
    <div style="border-radius: 5px; background-color: #ffffff; padding: 15px; color: #333333">

            <?php

            $a = $PicturesArray;
            $num1 = rand(0,sizeof($PicturesArray));
            $num2 =rand(0,sizeof($PicturesArray));
            $num3 =rand(0,sizeof($PicturesArray));

            $position1 = $a[$num1];
            $position2 = $a[$num2];
            $position3 = $a[$num3];


            ?>


    <center><h3><span>What is SLUGO?</span></h3></center>
    <p><center>SLUGO is where you want to be! SLUGO is a bi-annual, 12-hour
        gaming convention, hosted by the SELU ACM. Every semester, gamers look forward
        to this premiere event.  It’s your chance to show your skills in both PC
        and console tournaments, featuring some of the newest and hottest titles, and
        some of those timeless favorites.</center></p>
    </div>


            <div class="row">
                <div class="col-sm-6 col-md-4 homePadding" style="border-radius: 5px">
                    <div class="thumbnail" style="  border-radius: 5px;">


                        <img style="  border-radius: 5px;" src="<?=$position1['path']?>" alt="...">
                        <!--<div class="caption">
                            <h3>Thumbnail label</h3>
                        </div>-->
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 homePadding">
                    <div class="thumbnail" style="  border-radius: 5px;">
                        <img style="  border-radius: 5px;" src="<?=$position2['path']?>" alt="...">

                        <!--<div class="caption">
                            <h3>Thumbnail label</h3>
                        </div>-->
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 homePadding">
                    <div class="thumbnail" style="  border-radius: 5px;">
                        <img style="  border-radius: 5px;" src="<?=$position3['path']?>" alt="...">
                        <!--<div class="caption">
                            <h3>Thumbnail label</h3>
                        </div>-->
                    </div>
                </div>
            </div>


    <!-- SPONSOR LIST TILE -->
    <!-- WILL PULL TOURNAMENT LIST FROM DATABASE AND MAKE A TILE FOR IT -->
    <div class="tournamentList col-md-12">
        <div style="border-radius: 5px; background-color: #ffffff; padding: 15px; color: #333333">
        <p><center><h3>Sponsors</h3></center></p>
            </div>
        <p><center></center></p>
        <div class="row">
            <div class="col-sm-6 col-md-4 homePadding">
                <div class="thumbnail" style="  border-radius: 5px;">
                    <img style="  border-radius: 5px;" src="../../View/content/images/homeImages/image5303.png" alt="...">
                    <div class="caption">
                        <h3>Thermaltake</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 homePadding">
                <div class="thumbnail" style="  border-radius: 5px;">
                    <img style="  border-radius: 5px;" src="../../View/content/images/homeImages/image5314.png" alt="...">
                    <div class="caption">
                        <h3>ACM</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 homePadding">
                <div class="thumbnail" style="  border-radius: 5px;">
                    <img style="  border-radius: 5px;" src="../../View/content/images/homeImages/image5325.png" alt="...">
                    <div class="caption">
                        <h3>PAPA JOHNS</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4 homePadding">
                <div class="thumbnail" style="  border-radius: 5px;">
                    <img style="  border-radius: 5px;" src="../../View/content/images/homeImages/image5336.png" alt="...">
                    <div class="caption">
                        <h3>General Electric</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 homePadding">
                <div class="thumbnail" style="  border-radius: 5px;">
                    <img style="  border-radius: 5px;" src="../../View/content/images/homeImages/image5364.png" alt="...">
                    <div class="caption">
                        <h3>CGB</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 homePadding">
                <div class="thumbnail" style="  border-radius: 5px;">
                    <img style="  border-radius: 5px;" src="../../View/content/images/homeImages/image5368.png" alt="...">
                    <div class="caption">
                        <h3>FARA</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TOURNAMENT LIST TILE -->
    <!-- WILL PULL TOURNAMENT LIST FROM DATABASE AND MAKE A TILE FOR IT -->
    <!--<div class="tournamentList col-md-12">
        <p><center>Current Tournaments</center></p>
        <p><center>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Sed eleifend augue ligula, vitae fringilla dui elementum sit amet.
            Pellentesque elementum dui sed massa luctus lobortis. Aenean cursus
            libero id iaculis condimentum. Vestibulum porttitor purus id elit dictum,
            nec cursus lacus placerat.</center></p>
        <div class="row">
            <div class="col-sm-6 col-md-4 homePadding">
                <div class="thumbnail">
                    <img src="../content/images/slugoimages/IMG_20141024_194738994.jpg" alt="...">
                </div>
            </div>
            <div class="col-sm-6 col-md-4 homePadding">
                <div class="thumbnail">
                    <img src="../content/images/slugoimages/IMG_20141024_194738994.jpg" alt="...">
                </div>
            </div>
            <div class="col-sm-6 col-md-4 homePadding">
                <div class="thumbnail">
                    <img src="../content/images/slugoimages/IMG_20141024_194738994.jpg" alt="...">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4 homePadding">
                <div class="thumbnail">
                    <img src="../content/images/slugoimages/IMG_20141024_194738994.jpg" alt="...">
                </div>
            </div>
            <div class="col-sm-6 col-md-4 homePadding">
                <div class="thumbnail">
                    <img src="../content/images/slugoimages/IMG_20141024_194738994.jpg" alt="...">
                </div>
            </div>
            <div class="col-sm-6 col-md-4 homePadding">
                <div class="thumbnail">
                    <img src="../content/images/slugoimages/IMG_20141024_194738994.jpg" alt="...">
                </div>
            </div>
        </div>
    </div>-->

</div>