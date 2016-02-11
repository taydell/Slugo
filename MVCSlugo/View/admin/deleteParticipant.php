<?php
/**
 * Created by PhpStorm.
 * User: Coffin1
 * Date: 4/30/15
 * Time: 8:12 PM
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

echo "Hello";
$tourney = $_POST['tourney']; // joinHalo, joinMario, joinLeague, joinCounter
$tourneyId = $_POST['tourneyId']; // haloId, marioId, leagueId, counterId
$tourneyTeam = $_POST['tourneyTeam']; // haloTeam, marioTeam, leagueTeam, counterTeam
$tournament_url = $_POST['tournamentURL'];
$participant_id = $data->$tourneyId;
echo $participant_id;
echo "\n";
$participant = $c->makeCall("tournaments/$tournament_url/participants/$participant_id", array(), "delete");
$participant = $c->deleteParticipant($tournament_url, $participant_id);
echo "It worked";

if($data->$tourney==1){ $user->drop($id, $tourney);} else{}
echo "joined was changed";
$teamID = 0;
$user->createId($id,$teamID,$tourneyId);
echo "ID was set to 0";
$teamName = "";
$user->createTeam($id, $teamName, $tourneyTeam);
echo "Team was set to blank";
