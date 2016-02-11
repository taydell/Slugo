<?php
/**
 * Created by PhpStorm.
 * User: wilson
 * Date: 4/20/2015
 * Time: 9:40 PM
 */

header('Content-Type: application/json');

$uploaded = ['mp4','png'];
$allowed = [];

$succeeded =[];
$failed = [];

if(!empty($_FILES['file']))
{
    echo 'OK!';
}