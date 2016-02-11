<?php
/**
 * Created by PhpStorm.
 * User: wilson
 * Date: 3/12/2015
 * Time: 12:29 PM
 */

$pageTitle = "Home";
$PicturesArray = array();
require_once '../../Config/data/IncludesNeeded.php';
//require_once('../../Config/classes/DB.php');
require_once ('../../Config/data/databaseConnect.php');
require_once '../../View/general/moreLogic.php';


$HomeDatabase = new Home_logic;
$rows = $HomeDatabase->getRows();
$PicturesArray = $HomeDatabase->getArray();


//
//



$page = "../../View/general/homeView.php";
include "../../View/shared/templateNEW.php";