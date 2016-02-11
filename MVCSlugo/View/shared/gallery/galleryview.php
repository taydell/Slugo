<?php
require_once('Gallery.php');
$gallery = new slugoGallery();
$gallery->setPath('../../View/shared/gallery/slugoimagesmedia');
$images =$gallery->getImages(array('jpg'));

?>

<!DOCTYPE html>
<html>
    <head>  
        <title>Image gallery</title>
        <link rel="stylesheet" href="gallery.css">
    </head>
    <body>
        <div class="container">
            <?php if($images):


                ?>
            <div class="gallery cf">
                <?php foreach($images as $image): ?>
                  <div class="gallery-item">
                    <img src="<?php echo $image['full'] ?>">
                  </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
                There are no images.
            <?php endif; ?>
        </div>
    </body>
</html>
