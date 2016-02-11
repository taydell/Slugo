<?php
/**
 * Created by PhpStorm.
 * User: Coffin1
 * Date: 3/18/15
 * Time: 6:32 PM
 */

$user = new User();
if($user->isLoggedIn()) {
    $data = $user->data();
    $id = $data->id;
}

?>

<div class="bracketContainer">
    <div id="banner" class="col-md-12">
        <img src="../content/images/LeagueCharacter.png" height="250px" width="250px">
        <img id="center" src="../content/images/leagueOfLegendsBanner.png" height="100%" width="50%">
        <img src="../content/images/LeagueCharacter2.png" height="250px" width="250px">
    </div>
    <?php if($user->isLoggedIn() && ($data->joinLeague == 0)) { ?>
        <div id="bracketButtons" class="col-md-12">
            <button id="joinGame" class="md-trigger hvr-grow btn-success" data-modal="modal-11">Join</button>
        </div>
    <?php } else if($user->isLoggedIn() && $data->joinLeague == 1) { ?>
        <div id="bracketButtons" class="col-md-12">
            <button id="dropGame" class="md-trigger hvr-grow btn-danger" data-modal="modal-10">Drop</button>
        </div>
    <?php } else { ?>
        <div id="bracketButtons" class="col-md-12">
            <button id="joinGame" class="md-trigger hvr-grow btn-success" data-modal="modal-11">Join</button>
        </div>
    <?php } ?>

    <div class="md-modal md-effect-11" id="modal-10">
        <div class="md-content">
            <h3>Delete a Team</h3>
            <div class="popup">
                <form id="form">
                    Are you sure you want to delete your team?
                    <input id="teamURL" type="hidden" name="tournamentURL" value="hungryHippo">
                    <input id="teamToDrop" type="hidden" name="tourney" value="joinLeague">
                    <input id="tourneyId" type="hidden" name="tourneyId" value="leagueId">
                    <input id="tourneyTeam" type="hidden" name="tourneyTeam" value="leagueTeam">
                    <br>
                    <div class="btn-group-justified">
                        <button type="submit" id="yes" class="hvr-grow btn-success">Yes</button>
                        <button type="button" id="close" class="md-close hvr-grow btn-default">No</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="aside" class="col-md-2">
        <h1>Teams</h1>
        <div class="wireframe-box">
            <?php
            $arrlength = count($teams);
            if($arrlength <= 16) {
                echo "<ol>";
                for ($x = 0; $x < $arrlength; $x++) {
                    echo "<li>$teams[$x]</li>\n";
                }
                echo "</ol>";
            }
            else {
                echo "<ol>";
                for($x = 0; $x < 16; $x++) {
                    echo "<li>$teams[$x]</li>\n";
                }
                echo "</ol>";
                echo "<center><h2>Waiting List</h2></center>";
                echo "<ol start='17'>";
                for($x = 16; $x < $arrlength; $x++) {
                    echo "<li>$teams[$x]</li>\n";
                }
                echo "</ol>";
            }?>
        </div>
    </div>

    <div id="bracketPageLeague" class="col-md-10">
        <iframe id="Bracket" src="https://challonge.com/hungryHippo/module?multiplier=1.0&theme=3177&show_standings=1&show_final_results=0" width="100%" scrolling="no" frameborder="0"></iframe>
    </div>

    <div class="cover">

    </div>

    <?php if($user->isLoggedIn() && ($data->joinLeague==0)){?>
        <div class="md-modal md-effect-11" id="modal-11">
            <div class="md-content">
                <h3>Create a Team</h3>
                <div class="popup">
                    <form id="form">
                        Enter your team name here: &nbsp;<input id="submit" type="text" placeholder="Team Name" name="teamName">
                        <input id="URL" type="hidden" name="tournamentURL" value="hungryHippo">
                        <input id="tourney" type="hidden" name="tourney" value="joinLeague">
                        <input id="tourneyId" type="hidden" name="tourneyId" value="leagueId">
                        <input id="tourneyTeam" type="hidden" name="tourneyTeam" value="leagueTeam">
                        <br>
                        <div class="btn-group-justified">
                            <button type="submit" id="create" class="hvr-grow btn-success">Create</button>
                            <button type="button" id="close" class="md-close hvr-grow btn-default">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } else if($user->isLoggedIn() && ($data->joinLeague==1)) { ?>
        <div class="md-modal md-effect-11" id="modal-11">
            <div class="md-content">
                <h3>Create a Team</h3>
                <div class="popup">
                    <form id="form">
                        Sorry, you may only create one team per game.
                        <br>
                        <div class="btn-group-justified">
                            <button type="button" id="close" class="md-close hvr-grow">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="md-modal md-effect-11" id="modal-11">
            <div class="md-content">
                <h3>Create a Team</h3>
                <div class="popup">
                    <form id="form">
                        Sorry, you must log in to join the game.
                        <br>
                        <div class="btn-group-justified">
                            <button type="button" id="close" class="md-close hvr-grow">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
</div>