<?php
require_once '../../Config/core/init.php';

$user = new User();
$user ->logout();

Redirect::to('../../Controller/general/home.php');