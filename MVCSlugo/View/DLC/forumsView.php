<?php
/**
 * Created by PhpStorm.
 * User: wilson
 * Date: 2/25/2015
 * Time: 1:04 PM
 */
?>
<div class="forumsStructure">
    <center><h3><span>FORUMS</span></h3></center>
    <div class="tile-xlarge col-md-12">
        <hr>
        <!-- EACH SPONSOR WILL HAVE A TILE FOR THEM SELVES -->
        <!--  -->
        <!-- EACH SPONSOR WILL HAVE A TILE FOR THEM SELVES -->
        <?php $spon = 0; $sponlist = 10; ?>
        <?php while($spon < $sponlist){ ?>
            <div class="tile-large">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" id="picture" data-parent="#accordion" href="#<?=$spon ?>" aria-expanded="true" aria-controls="<?=$spon ?>">
                                    <img src="../content/images/league2.jpg" width="100%" height="100%">
                                </a>
                            </h4>
                        </div>
                        <div id="<?=$spon ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                Here is information about the game
                                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                    <div class="btn-group" role="group">
                                        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" <button type="button" id="join" class="btn">Join</button></a>
                                    </div>
                                    <div class="btn-group" role="group">
                                        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" <button type="button" id="twitch" class="btn">Twitch</button></a>
                                    </div>
                                    <div class="btn-group" role="group">
                                        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" <button type="button" id="brackets" class="btn">Brackets</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $spon++; ?>
        <?php } ?>
    </div>
</div>