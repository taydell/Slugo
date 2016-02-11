/**
 * Created by Coffin1 on 4/28/15.
 */

$(function() {
    $('#create').one('click', function (e) {

        e.preventDefault();
        var teamName = $("#submit").val();
        var URL = $("#URL").val();
        var tourney = $("#tourney").val();
        var tourneyId = $('#tourneyId').val();
        var tourneyTeam = $("#tourneyTeam").val();

        $.ajax({
            url: 'createParticipant.php',
            type: 'post',
            data: {
                teamName: teamName,
                tournamentURL: URL,
                tourney: tourney,
                tourneyId: tourneyId,
                tourneyTeam: tourneyTeam
            },
            success: function (data, status) {
                console.log(data);
                if(teamName != "") {

                    $('.popup').replaceWith("<br><br><center><h1>You successfully created: " + teamName + " </h1></center><center><img src='http://images.clipartpanda.com/smiley-face-thumbs-up-clipart-acqbqAzcM.png' width='150px' height='150px'></center> <br> <br>");

                    $('body').load('#Bracket', function () {

                    });
                } else {
                    $('.popup').replaceWith('<br><br><center><h2>Sorry, the name cannot be blank.</h2><br><br>');

                    $('body').load('#Bracket', function () {
                        /// can add another function here
                    })
                }
            },
            error: function (desc, err) {
                console.log("Details: " + desc + "\nError:" + err);
            }
        }); // end ajax call
    });
});

$(function() {
    $('#yes').one('click', function (e) {

        e.preventDefault();
        var teamURL = $("#teamURL").val();
        var tourney = $("#teamToDrop").val();
        var tourneyId = $('#tourneyId').val();
        var tourneyTeam = $("#tourneyTeam").val();

        $.ajax({
            url: 'deleteParticipant.php',
            type: 'post',
            data: {
                tournamentURL: teamURL,
                tourney: tourney,
                tourneyId: tourneyId,
                tourneyTeam: tourneyTeam
            },
            success: function (data, status) {
                console.log(data);

                $('.popup').replaceWith('<br><br><center><h2>You successfully deleted your team</h2><br><br>');

                $('body').load('#Bracket', function () {

                });

            },
            error: function (desc, err) {
                console.log("Details: " + desc + "\nError:" + err);
            }
        }); // end ajax call
    });
});





