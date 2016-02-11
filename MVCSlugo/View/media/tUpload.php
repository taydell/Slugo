<?php
require_once('../../Config/data/databaseConnect.php');
//require_once '../../Config/core/initForUpload.php';




function upload($mid,$cid,$named,$path)
{
    $user = new User();
    try {
        $user->insertImage(array(
            'mid' =>$mid,
            'cid' =>$cid,
            'name' =>$named,
            'path' =>$path
        ));

    } catch (Exception $e) {
        die($e->getMessage());
    }
}




error_reporting(0);
if($_POST['submit'])
{
    $name = basename($_FILES['file_upload']['name']);
    $t_name=$_FILES['file_upload']['tmp_name'];
    $dir='../../content/images/tUpload';
    $tGallery=$_POST['tGallery'];

    if(move_uploaded_file($t_name,$dir."/".$name))
    {
        $mid = '';
        $cid = $tGallery;
        $named = $name;
        $path ="../content/images/tUpload/".$name;





        //upload($mid,$cid,$name,$path);

        echo 'file upload sussessfully';

    }
    else
    {
        echo ini_get('upload-max-filesize');
        echo 'upload failed.';
    }
}

?>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Upload</title>
</head>

<body>

<form action="tUpload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file_upload" /><br/>
    <label for="title">tGallery_id:
        <select name="tGallery">
            <option value="1st">1ST</option>
            <option value="2nd">2ND</option>
        </select></label><br/>

    <input type="submit" name="submit" value="upload"/>
</form>
</body>