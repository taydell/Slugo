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
$pageTitle = "Info";
$DevelopersDataArray = array();
//require_once('../../Config/classes/DB.php');
require_once ('../../Config/data/databaseConnect.php');
require_once ('../../View/general/DeveloperPageLogic.php');
require_once '../../Config/data/IncludesNeeded.php';
//
//
$DevelopersDatabase = new Developer_database_files;

$rows = $DevelopersDatabase->getRows();
$DevelopersDataArray = $DevelopersDatabase->getArray();


$page = "../../View/general/DeveloperView.php";
include "../../View/shared/templateNEW.php";