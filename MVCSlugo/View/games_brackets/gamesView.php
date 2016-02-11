<?php
/**
 * Created by PhpStorm.
 * User: wilson
 * Date: 2/25/2015
 * Time: 1:05 PM
 */


?>
<div class="gamesStructure">
    <div style="border-radius: 5px; background-color: #ffffff; padding: 15px; color: #333333; margin-bottom: 15px">
        <center><h3><span>Games</span></h3></center>
        <p><center>Current tournaments held.</center></p>
        <p><center>Click image for info.</center></p>
    </div>
        <!-- LOOP WILL PULL DATA FROM THE DATABASE FILE FOR THIS PAGE AND INSERT IT INTO THE PAGE -->
        <!-- TEMP VARIABLES -->

    <!--<pre>

            <?php
            print_r($gameDataArray);
            ?>

    </pre>-->

    <?php

    $gameDataArrayPosition = 0;

    while($gameDataArrayPosition < $rows)
    {

    ?>

        <div class="panel panel-default" style="max-width: 800px; margin-left: auto; margin-right: auto;">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#<?=$gameDataArrayPosition?>" aria-expanded="true" aria-controls="<?=$gameDataArrayPosition?>">
                        <div class="tileBlock">
                            <img src="<?=$gameDataArray[$gameDataArrayPosition]['game_banner'];?>">
                        </div>
                    </a>
                </h4>
            </div>
            <div id="<?=$gameDataArrayPosition?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <div class="col-md-8" style="text-align: center;">
                        <div class="well" style="height: auto">

                            <?=$gameDataArray[$gameDataArrayPosition]['description'];?>
                        </div>
                    </div>
                    <div class="col-md-4" style="text-align: center;">
                        <div class="well"><div style="font-size: 300%"><?=$gameDataArray[$gameDataArrayPosition]['player_count']?></div> players</div>
                    </div>
                    <a href="<?=$gameDataArray[$gameDataArrayPosition]['brackets']?>" style="background-color: transparent">
                    <div class="col-md-12" style="text-align: center; background-color: #006699; padding: 10px; border-radius: 5px; color: #ffffff;">
                        Brackets
                    </div>
                    </a>
                </div>
            </div>
        </div><!-- /panel --><!-- /panel -->

    <?php $gameDataArrayPosition++; }?>
</div>
