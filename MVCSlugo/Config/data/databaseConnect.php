<?php
/**
 * Created by PhpStorm.
 * User: wilson
 * Date: 2/28/2015
 * Time: 4:40 PM
 */
/**figure out how to get rid of this page**/

$localhost = "localhost";
$localuser = "root";
$dbpassword =  "";
$localdb = "acm_slugo";

try {
    $conn = new PDO("mysql:host=$localhost;dbname=$localdb", $localuser, $dbpassword);
} catch(PDOException $ex) {
    die('Could not connect to the database:' . $ex);
}