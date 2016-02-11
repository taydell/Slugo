<?php
/**
 * Created by PhpStorm.
 * User: Coffin1
 * Date: 4/27/15
 * Time: 9:23 PM
 */

// Include the class on your page somewhere
include '../../View/games_brackets/challonge.class.php';
require_once '../../Config/data/IncludesNeeded.php';


$user= new User();
$data = $user->data();
$id = $data->id;


// Create a new instance of the API wrapper. Pass your API key into the constructor
// You can view/generate your API key on the 'Password / API Key' tab of your account settings page.
$c = new ChallongeAPI('Ornc1jHVTVFHnGnADqiyYjF1LHruVlXbOnBFEj4j');


/*
  For whatever reason (example: developing locally) if you get a SSL validation error from CURL,
  you can set the verify_ssl attribute of the class to false (defualts to true). It is highly recommended that you
  **NOT** do this on a production server.
*/
$c->verify_ssl = false;

$tournament_id = $_POST['tournamentURL'];
$participants = $c->makeCall("tournaments/$tournament_id/participants");
$participants = $c->getParticipants($tournament_id);

foreach ($participants->participant as $character) {
    $teams[] = $character->name;
}



$whatever = true;

$teamName = $_POST['teamName']; // whatever team name the user creates
$tourney = $_POST['tourney']; // joinHalo, joinMario, joinLeague, joinCounter
$tourneyId = $_POST['tourneyId']; // haloId, marioId, leagueId, counterId
$tourneyTeam = $_POST['tourneyTeam']; // haloTeam, marioTeam, leagueTeam, counterTeam
$tournament_url = $_POST['tournamentURL'];

$arrlength = count($teams);
for($x = 0; $x <= $arrlength; $x++) {
    if($teamName == $teams[$x]) {
        echo "The team already exists";
        $whatever = false;
        break;
    }
}

if($whatever) {
    if ($data->$tourney == 0) {
        $user->join($id,$tourney);
    } else {
    }


    $params = array(
        "participant[name]" => $teamName,
    );

    $teams = $teamName;

    $participant = $c->makeCall("tournaments/$tournament_url/participants", $params, "post");
    $participant = $c->createParticipant($tournament_url, $params);

    $user->createTeam($id, $teams, $tourneyTeam);
}

$participants = $c->makeCall("tournaments/$tournament_url/participants");
$participants = $c->getParticipants($tournament_url);

foreach ($participants->participant as $character) {
    if($teams == $character->name) {
        $teamID = $character->id;
    }
}

$user->createId($id,$teamID,$tourneyId);

echo $teamID;


















