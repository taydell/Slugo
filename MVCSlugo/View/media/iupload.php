<?php
require_once('../../Config/data/databaseConnect.php');
//require_once '../../Config/data/initForUpload.php';
require_once('../media/tGalleryLogic.php');

$move_uploaded_file = 20000000;

$tGalleryDataArray = array();
$tGalleryDatabase = new tGallery_database_files;

$rows = $tGalleryDatabase->getRows();
$tGalleryDataArray = $tGalleryDatabase->getArray();

function upload($mid,$cid,$named,$path)
{
    $user = new User();
    try {
        $user->insertImage(array(
            'mid' => $mid,
            'cid' => $cid,
            'name' => $named,
            'path' => $path
        ));

    } catch (Exception $e) {
        die($e->getMessage());
    }
}

if(!empty($_FILES['files']['name'][0])) {
    $files = $_FILES['files'];
    $uploaded = array();
    $failed = array();
    $allowed = array('png','jpg');
    foreach($files['name'] as $position => $file_name) {
        $file_tmp = $files['tmp_name'][$position];
        $file_size = $files['size'][$position];
        $file_error = $files['error'][$position];

        $file_ext = explode('.' , $file_name);
        $file_ext = strtolower(end($file_ext));

        if(in_array($file_ext, $allowed)) {
            echo "<script>console.log('we made it')</script>";
            if($file_error == 0) {
                if($file_size <= 2097152) {
                    $file_name_new = uniqid('', true) . '.' . $file_ext;
                    $file_destination = '../../content/images/slugoimages/' . $file_name_new;
                    $tGallery=$_POST['tGallery']+ 1;
                    if(move_uploaded_file($file_tmp, $file_destination))
                    {
                        $uploaded[$position] = $file_destination;

                        $mid = '';
                        $cid = $tGallery;
                        $named =$file_name_new;
                        $path ='../content/images/slugoimages/' . $file_name_new;


                        upload($mid,$cid,$named,$path);


                    }
                    else {
                        $failed[$position] = "[{$file_name}] failed to upload.";
                    }
                }
                else {
                    $failed[$position] = "[{$file_name}] is too large.";
                }
            }
            else {
                $failed[$position] = "[{$file_name}] error with code {$file_error}";
            }
        }
        else {
            $failed[$position] = "[{$file_name}] file extension '{$file_ext}' is not allowed.";
        }
    }

    if(!empty($uploaded)) {
        //print_r($uploaded);
        echo 'file upload successfully';
    }

    if(!empty($failed)) {
        print_r($failed);
    }
}
$arrayPosition = 0;
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Multiple file upload </title>
    </head>
    <body>
        <form action = "iupload.php" method = "post" enctype = "multipart/form-data" >
            <input type = "file" name = "files[]" multiple><br/>
            <label for="title">tGallery_id:
                <select name="tGallery">
                    <?php while($arrayPosition<$rows)
                    { $cname = $tGalleryDataArray[$arrayPosition]['name'];

                        ?>
                    <option value="<?=$arrayPosition?> " > <?=$cname?> </option>
                    <?php $arrayPosition++; } ?>
                </select></label><br/>
            <input type = "submit" value = "Upload" >
        </form>
    </body>
</html>