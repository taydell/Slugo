
<div class="galleryStructure">
    <!-- LOOP WILL PULL DATA FROM THE DATABASE FILE FOR THIS PAGE AND INSERT IT INTO THE PAGE -->
    <!-- TEMP VARIABLES -->

    <!--<pre>
            <?php
            //print_r($tGalleryDataArray);
            ?>
    </pre>-->
<?php

$tGalleryPosition = 0;
?>
    <div class="sidebar">

        <div class="title">
            <h1>GALLERY</h1>
            <hr>
        </div>

        <?php while($tGalleryPosition < $rows){

    $id= $tGalleryDataArray[$tGalleryPosition]['id']; ?>
            <h1><a href="../../Controller/media/tImage.php?cid=<?=$id;?>" target="test1"><?=$tGalleryDataArray[$tGalleryPosition]['name'];?></a></h1>
    <?php $tGalleryPosition++;}?>
    </div>
    <div class="cmView">

        <div class="" style=" background-color: rgba(255, 255, 255, 0.54); width: 100%; height: 1000px;">
            <iframe src="../../Controller/media/tImage.php?cid=<?=$id;?>" width="100%" height="100%" name="test1" id="test1"></iframe>
  </iframe>-->
    </div>
</div>

<!--<a href="tImage.php"></a>-->






