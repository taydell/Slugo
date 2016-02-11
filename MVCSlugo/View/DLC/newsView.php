<?php
/**
 * Created by PhpStorm.
 * User: wilson
 * Date: 3/1/2015
 * Time: 9:02 PM
 */
?>
<div class="newsStructure">
    <center><h3><span>Sponsors</span></h3></center>
    <p><center>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Sed eleifend augue ligula, vitae fringilla dui elementum sit amet.
        Pellentesque elementum dui sed massa luctus lobortis. Aenean cursus
        libero id iaculis condimentum. Vestibulum porttitor purus id elit dictum,
        nec cursus lacus placerat.</center></p>
    <div class="tile-xlarge col-md-12">
        <hr>
        <!-- EACH SPONSOR WILL HAVE A TILE FOR THEM SELVES -->
        <!--  -->
        <!-- EACH SPONSOR WILL HAVE A TILE FOR THEM SELVES -->
        <?php $spon = 0; $sponlist = 10; ?>
        <?php while($spon <= $sponlist){ ?>
            <div class="tile-large">
                <div class="tile-image col-md-3">
                    <hr>
                    <hr>
                    <hr>
                    <hr>
                    <hr>

                </div>
                <div class="col-md-9">

                    <p>Email:</p>
                    <p>phone:</p>
                    <p>website:</p>
                    <p>description:</p>
                    <hr>
                </div>
            </div>
            <?php $spon++; ?>
        <?php } ?>
    </div>
</div>