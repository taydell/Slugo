
<div class="gamesStructure col-md-12">


    <script type="text/javascript">
        $(document).ready(function() {
            /*
             *  Simple image gallery. Uses default settings
             */

            $('.fancybox').fancybox();

            /*
             *  Different effects
             */

            // Change title type, overlay closing speed
            $(".fancybox-effects-a").fancybox({
                helpers: {
                    title : {
                        type : 'outside'
                    },
                    overlay : {
                        speedOut : 0
                    }
                }
            });

            // Disable opening and closing animations, change title type
            $(".fancybox-effects-b").fancybox({
                openEffect  : 'none',
                closeEffect	: 'none',

                helpers : {
                    title : {
                        type : 'over'
                    }
                }
            });

            // Set custom style, close if clicked, change title type and overlay color
            $(".fancybox-effects-c").fancybox({
                wrapCSS    : 'fancybox-custom',
                closeClick : true,

                openEffect : 'none',

                helpers : {
                    title : {
                        type : 'inside'
                    },
                    overlay : {
                        css : {
                            'background' : 'rgba(238,238,238,0.85)'
                        }
                    }
                }
            });

            // Remove padding, set opening and closing animations, close if clicked and disable overlay
            $(".fancybox-effects-d").fancybox({
                padding: 0,

                openEffect : 'elastic',
                openSpeed  : 150,

                closeEffect : 'elastic',
                closeSpeed  : 150,

                closeClick : true,

                helpers : {
                    overlay : null
                }
            });

            /*
             *  Button helper. Disable animations, hide close button, change title type and content
             */

            $('.fancybox-buttons').fancybox({
                openEffect  : 'none',
                closeEffect : 'none',

                prevEffect : 'none',
                nextEffect : 'none',

                closeBtn  : false,

                helpers : {
                    title : {
                        type : 'inside'
                    },
                    buttons	: {}
                },

                afterLoad : function() {
                    this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
                }
            });


            /*
             *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
             */

            $('.fancybox-thumbs').fancybox({
                prevEffect : 'none',
                nextEffect : 'none',

                closeBtn  : false,
                arrows    : false,
                nextClick : true,

                helpers : {
                    thumbs : {
                        width  : 50,
                        height : 50
                    }
                }
            });

            /*
             *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
             */
            $('.fancybox-media')
                .attr('rel', 'media-gallery')
                .fancybox({
                    openEffect : 'none',
                    closeEffect : 'none',
                    prevEffect : 'none',
                    nextEffect : 'none',

                    arrows : false,
                    helpers : {
                        media : {},
                        buttons : {}
                    }
                });

            /*
             *  Open manually
             */

            $("#fancybox-manual-a").click(function() {
                $.fancybox.open('1_b.jpg');
            });

            $("#fancybox-manual-b").click(function() {
                $.fancybox.open({
                    href : 'iframe.html',
                    type : 'iframe',
                    padding : 5
                });
            });

            $("#fancybox-manual-c").click(function() {
                $.fancybox.open([
                    {
                        href : '1_b.jpg',
                        title : 'My title'
                    }, {
                        href : '2_b.jpg',
                        title : '2nd title'
                    }, {
                        href : '3_b.jpg'
                    }
                ], {
                    helpers : {
                        thumbs : {
                            width: 75,
                            height: 50
                        }
                    }
                });
            });


        });
    </script>
    <!--<pre>

            <?php

           //print_r($tImageDataArray);

            ?>
    </pre>-->

    <?php

    if(isset($_GET['cid'])== true)
    {
        $id = trim($_GET['cid']);

        foreach($tCategoryDataArray as $category)
            if($id == $category['id'])
            {?>
    <div class="thumbnail galleryPadding" style="border-radius: 5px; background-color: #ffffff; padding: 15px; color: #333333">
                <center><h3><span><?= $category['name'];?> </span></h3></center>
        </div>
           <?php } ?>
        <div class="col-md-12">
        <div class="row">
            <div class="col-sm-6 col-md-4 galleryBlock">
                <div class="thumbnail galleryPadding" style="background-color: transparent">
                    <a class="fancybox" rel="fancybox" href="http://localhost:63342/slugo/views/media.php"><img src="../../View/content/images/slugoCat/cat.png" style="background-color: transparent; border-radius: 5px; height: auto; width: 100%; overflow: hidden"></a>
                </div>
            </div>
            <?php
        $tImagePosition = 0;
        foreach($tImageDataArray as $image):
            if ($id == ($image['cid']))
            {

               ?>
                <!--<div class="col-xs-3" >-->
                <?php //foreach($tImageDataArray as $image): ?>
                <div class="col-sm-6 col-md-4 galleryBlock">
                    <div class="thumbnail galleryPadding" style="background-color: transparent">
                        <a class="fancybox" rel="fancybox" href="<?= $image['path'];?>" title="<?php $tImageDataArray[$tImagePosition]['name'] ?>"><img src="<?= $image['path'];?>" style="background-color: transparent; border-radius: 5px; height: auto; width: 100%; overflow: hidden"/></a>
                    </div>
                </div>
            <?php }endforeach;?>
            </div>
        </div>
    <?php
    }?>
</div>
