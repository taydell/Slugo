<?php
/**
 * Created by PhpStorm.
 * User: wilson
 * Date: 2/25/2015
 * Time: 5:52 PM
 */
$pageTitle = "Games";
$gameDataArray = array();
// database connections
require_once ('../../Config/data/databaseConnect.php');
require_once ('../../View/games_brackets/gameLogic.php');
require_once '../../Config/data/IncludesNeeded.php';
//

$gameDatabase = new game_database_files();

$rows = $gameDatabase->getRows();
$gameDataArray = $gameDatabase->getArray();

//

$page = "../../View/games_brackets/gamesView.php";
//$sideBar = "shared/sideBar/sideBar.php";
require_once "../../View/shared/templateNEW.php";