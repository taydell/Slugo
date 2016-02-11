<?php
/**
 * Created by PhpStorm.
 * User: wilson
 * Date: 2/25/2015
 * Time: 5:15 PM
 */
//database stuff
//
//
$pageTitle = "tGallery";
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


$page = "../../View/media/tGalleryView.php";
//require_once '../login/contact.php';
//$leftSideBar = "shared/sideBars/leftSideBar.php";
include "../../View/shared/templateNEW.php";