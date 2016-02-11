<?php
/**
 * Created by PhpStorm.
 * User: wilson
 * Date: 2/25/2015
 * Time: 1:15 PM
 */
?>

<div class="sponsorsStructure">
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
        <div class="col-md-12">
            <div class="col-md-3" style="background-color: #2aabd2">
                <hr>
                <hr>
                <hr>
                <hr>
                <hr>

            </div>
            <div class="col-md-9" style="background-color: darkolivegreen">

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