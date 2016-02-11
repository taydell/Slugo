<?php
/**
 * Created by PhpStorm.
 * User: wilson
 * Date: 4/27/2015
 * Time: 7:25 PM
 */
$tGalleryPosition = 0;
?>

    <!--<pre>

            <?php
            //print_r($wGalleryDataArray);
            ?>

    </pre>-->

<div class="gamesStructure col-md-12">
    <div class="col-md-12" style="border-radius: 5px; background-color: #ffffff; padding: 15px; color: #333333">
    <center><h3>Gallery</h3></center>
    </div>
        <?php while($tGalleryPosition < $rows)
        {
            $id= $tGalleryDataArray[$tGalleryPosition]['id']; ?>
            <div class="col-sm-12 col-md-6 galleryBlock">
                <div class="thumbnail galleryPadding" style="border-radius: 5px">
                    <a href="tImage.php?cid=<?=$id;?>"><img style="border-radius: 5px" src="../../View/content/images/slugoCat/<?=$wGalleryDataArray[$tGalleryPosition]['image'];?>" alt="..."></a>
                </div>
            </div>
            <!--<h1><a href="../../Slugo/views/tImage.php?cid=<?=$id;?>" target="test1"><?=$tGalleryDataArray[$tGalleryPosition]['name'];?></a></h1>-->
            <?php $tGalleryPosition++;
        }?>
</div>