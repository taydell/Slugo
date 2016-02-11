<?php
/**
 * Created by PhpStorm.
 * User: Coffin1
 * Date: 3/18/15
 * Time: 6:32 PM
 */

?>

<div class="bracketContainer">
    <div id="banner" class="col-md-12">
        <img src="../content/images/haloElite.png" height="150px" width="150px">
        <img id="center" src="../content/images/haloBannerImage.png" height="150" width="50%">
        <img src="../content/images/halo2.png" height="150px" width="150px">
    </div>

    <div id="bracketButtons" class="col-md-12">
        <button id="join" class="md-trigger" data-modal="modal-11">Join</button>
    </div>

    <div class="md-overlay"></div>

    <div id="aside" class="col-md-2">
        <div class="wireframe-box">
            <h1>Teams</h1>
            <ol>
                <li>Reapers</li>
                <li>Hunters</li>
                <li>Lions</li>
                <li>Indians</li>
                <li>Spartans</li>
                <li>Death Dealers</li>
                <li>Assassins</li>
                <li>Elites</li>
            </ol>
        </div>
    </div>

    <div id="bracketPage" class="col-md-9">
        <iframe id="Bracket" src="https://challonge.com/hungryHippo/module?multiplier=1.0&theme=3177&show_standings=1&show_final_results=0" width="100%" height="100px" scrolling="no" frameborder="0"></iframe>
    </div>

    <div class="cover">

    </div>

    <?php if($user->isLoggedIn()){?>
    <div class="md-modal md-effect-11" id="modal-11">
        <div class="md-content">
            <h3>Create a Team</h3>
            <div class="popup">
                <form id="form">
                    Enter your team name here:  <input id="submit" type="text" placeholder="Team Name" name="teamName">
                    <input id="URL" type="hidden" name="tournamentURL" value="hungryHippo">
                    <button id="create" class="hvr-grow">Create</button>
                </form>
                    <br>
                <button id="close" class="md-close hvr-grow">Cancel</button>
            </div>
        </div>
    </div>
    <?php } else { ?>
    <div class="md-modal md-effect-11" id="modal-11">
        <div class="md-content">
            <h3>Create a Team</h3>
            <div class="popup">
                <form id="form">
                    Sorry, You must log in to join.
                </form>
                <br>
                <button id="close" class="md-close hvr-grow">Cancel</button>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

