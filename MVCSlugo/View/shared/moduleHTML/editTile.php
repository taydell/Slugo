<?php
/**
 * Created by PhpStorm.
 * User: wilson
 * Date: 4/17/2015
 * Time: 11:41 AM
 */
?>
<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <title>Uploader</title>
        <link rel="stylesheet" href="global.css">
    </head>
    <body>
        <form action="" method="post" enctype="multipart/form-data" id="upload" class="upload">
            <fieldset>
                <legend>Upload files</legend>
                <input type="file" id="file" name="file[]" required multiple>
                <input type="submit" id="submit" name="submit" value="Upload">
            </fieldset>

            <div class="bar">
                <span class="bar-fill"><span class="bar-fill-text"></span></span>
            </div>

            <div id="uploads" class="uploads">
                Uploaded file links will appear here.

                <a href="">file.txt</a>
                <a href="">file.txt</a>

                <p>These files didn't upload:</p>

                <span>file.txt</span>
                <span>file.txt</span>

            </div>

        </form>
    </body>
</html>