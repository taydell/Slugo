<?php
$gallery = new Gallery();
$gallery->setPath('../../View/content/images/slugoimages/');

$images = $gallery->getImages(array('jpg'));

/**
 * Created by PhpStorm.
 * User: wilson
 * Date: 2/25/2015
 * Time: 1:05 PM
 */

?>

        <div class="container">
            <?php if($images): ?>
            <div class="gallery cf">
                <?php foreach($images as $image): ?>
                   <div class = "gallery-item">
                       <a href="<?php echo $image['full']; ?>"><img src="<?php echo $image['full']; ?>"></a>
                   </div>
                <?php endforeach; ?>
             <div>

             </div>
            <?php else: ?>
                There are no images.
            <?php endif; ?>
         </div>