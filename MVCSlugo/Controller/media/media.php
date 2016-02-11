<?php
/**
* Created by PhpStorm.
 * User: wilson
* Date: 2/25/2015
* Time: 5:14 PM
*/
//database stuff
//
//
$pageTitle = "Media";
$tGalleryDataArray = array();
//require_once('../../Config/classes/DB.php');
require_once ('../../Config/data/databaseConnect.php');
require_once ('../../View/media/tGalleryLogic.php');

require_once '../../Config/data/IncludesNeeded.php';
//
//

$tGalleryDatabase = new tGallery_database_files;

$rows = $tGalleryDatabase->getRows();
$tGalleryDataArray = $tGalleryDatabase->getArray();
$wGalleryDataArray = $tGalleryDatabase->getArrayImages();

$page = "../../View/media/wgallery.php";

//$sideBar = "shared/sideBars/sideBar.php";
include "../../View/shared/templateNew.php";