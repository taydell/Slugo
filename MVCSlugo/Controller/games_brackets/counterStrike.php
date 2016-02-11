<?php
/**
 * Created by PhpStorm.
 * User: Coffin1
 * Date: 3/18/15
 * Time: 6:32 PM
 */
// Include the class on your page somewhere
include '../../View/games_brackets/challonge.class.php';


// Create a new instance of the API wrapper. Pass your API key into the constructor
// You can view/generate your API key on the 'Password / API Key' tab of your account settings page.
$c = new ChallongeAPI('Ornc1jHVTVFHnGnADqiyYjF1LHruVlXbOnBFEj4j');


/*
  For whatever reason (example: developing locally) if you get a SSL validation error from CURL,
  you can set the verify_ssl attribute of the class to false (defualts to true). It is highly recommended that you
  **NOT** do this on a production server.
*/
$c->verify_ssl = false;


$tournament_id = 'hungryHippo';
$participants = $c->makeCall("tournaments/$tournament_id/participants");
$participants = $c->getParticipants($tournament_id);

foreach ($participants->participant as $character) {
    $teams[] = $character->name;
}

$pageTitle = "Brackets";
require_once '../../Config/data/IncludesNeeded.php';
//
//
$page = "../../View/games_brackets/counterStrikeBracket.php";

include "../../View/shared/templateNEW.php";

