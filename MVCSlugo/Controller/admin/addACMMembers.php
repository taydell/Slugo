<?php
/**
 * Created by PhpStorm.
 * User: wilson
 * Date: 3/1/2015
 * Time: 7:47 PM
 */
//database stuff
//
//
$pageTitle = "ADMIN";
require_once ('../../Config/data/databaseConnect.php');
require_once ('../../Controller/admin/addACMMembers.php');
require_once '../../Config/data/IncludesNeeded.php';
//
//
$page = "../../View/admin/addACMMembersView.php";
//$sideBar = "shared/sideBars/sideBar.php";
include "../../View/shared/admin_template.php";