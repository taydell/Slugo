/*
*
* Global variables to be used,
* function to receive player names
* and another to calculate the number of rounds
*
*
*/
var players = [];
var numOfPlayers;
var numOfBaseRounds;
var numOfBasePlayers = 1;
var additionalRound = false;
var numOfPlayersLeft;

var cellSpace = 60;
var pDivHeight = 20;
var pDivWidth = 90;
var lDivWidth = 8;


//Gets the player names from submit form and appends it to players[]
function GetPlayers(){
    players.push(document.getElementById('inputTeam').value);
    numOfPlayers = players.length;   //updates amount of players
    numOfGames = numOfPlayers - 1;     //Calculates number of games to be played
}

//Calculates the number of rounds to be played
function GetNumRounds(){
    while(numOfBasePlayers <= numOfPlayers) {
        numOfBasePlayers = numOfBasePlayers * 2;
    }
    numOfBasePlayers = numOfBasePlayers/2;

    if(numOfBasePlayers != numOfPlayers){additionalRound = true;}
    numOfBaseRounds = Math.log(numOfBasePlayers) / Math.log(2) + 1;
}
/*
 *
 * Player object class and accompanying methods
 *
 * Function to populate bracket with player objects
 *
 */
//removes player object from parent and replaces with text node(name of player)
function ObjectSetName(posString){
    var parentObject = $(posString);
    var playerObject = parentObject.children(0);
    var playerObjectName = document.createTextNode(playerObject.attr('value'));
    var paraContainer =  $('<p>');
    paraContainer.css('position', 'relative');
    paraContainer.css('bottom', '12px');
    paraContainer.css('left', '5px');
    paraContainer.append(playerObjectName);
    parentObject.empty(0);
    parentObject.append(paraContainer);
}
//gets the player object who lost and replaces with text
function ObjectSetLoser(round, placement){
    var hasOpponent;
    var winnerParent = $('#r'+round+'p'+placement);
    var loserParentString;
    if(winnerParent.attr('title')== 0){
        loserParentString = '#r'+round+'p'+(placement+1);
    }else{
        loserParentString = '#r'+round+'p'+(placement-1);
    }
    if($(loserParentString).children().length != 0){ObjectSetName(loserParentString);hasOpponent = true;
    } else{hasOpponent = false;}

    return(hasOpponent);
}
//calculates and returns the placement of player object
function GetNewPlacement(round, placement){
    var objectParent = $('#r'+round+'p'+placement);
    var newPlacement;

    if(objectParent.attr('title')== 0){
        newPlacement = placement/2;
    }else{
        newPlacement = (placement-1)/2;
    }
    return(newPlacement);
}
//button object for each player with round and placement as object variables and the functionality to advance and be removed from bracket
function PlayerObject(pName, pRound, pPlacement){
    var name = pName;
    var round = pRound;
    var placement = pPlacement;

    this.playerElement = document.createElement('input');
    this.playerElement.setAttribute('value', name);
    this.playerElement.setAttribute('type', 'button');
    this.playerElement.setAttribute('id', placement);
    this.playerElement.setAttribute('class', 'player_button');
    this.playerElement.style.background = 'none';
    this.playerElement.style.border = 'none';
    this.playerElement.style.width = '80px';
    this.playerElement.style.position = 'relative';
    this.playerElement.style.left = '3px';
    this.playerElement.style.color = '#a31b1b';

    this.playerElement.onclick = function(){onPlayerObjectClick();};


    function onPlayerObjectClick(){
        var winnerPosString = '#r'+round+'p'+placement;
        var winnerObject = $(winnerPosString).children(0);
        if(!ObjectSetLoser(round, placement)){return;}
        ObjectSetName(winnerPosString);

        //increments the round and placement to set the new parent div stringPos
        placement = GetNewPlacement(round, placement);
        round = round - 1;
        var newParent = $('#r'+round+'p'+placement);
        newParent.append(winnerObject);
    }

}
//places player object in correct position
function PopulateBracket(){
    var addRoundNumPlayers = (numOfPlayers - Math.pow(2,numOfBaseRounds-1))*2;
    var positionString;
    var playerObject;
    var pDiv;
    var baseR = addRoundNumPlayers; //keep track of elements in players[]

    for(var i = 0; i < addRoundNumPlayers; i++){
        positionString = '#r'+(numOfBaseRounds+1)+'p'+i;

        playerObject = new PlayerObject(players[i], (numOfBaseRounds+1), i).playerElement;
        pDiv = $(positionString);
        pDiv.append(playerObject);
    }
    for(var n = addRoundNumPlayers/2; n < numOfBasePlayers; n++){
        positionString = '#r'+numOfBaseRounds+'p'+n;

        playerObject = new PlayerObject(players[baseR], numOfBaseRounds, n).playerElement;
        pDiv = $(positionString);
        pDiv.append(playerObject);
        baseR = baseR + 1;
    }
}

/*
 *
 * Functions to draw bracket
 * Main function is last
 *
 *
 */

function CreateDiv(parent, id, height, width){

    var div =  $('<div>', { id: id});
    div.css('height', height);
    div.css('max-height', height);
    div.css('width', width);
    div.css('max-width', width);
    div.css('position', 'relative');
    div.css('float', 'right');
    div.css('background-color', '#292c2f');

    parent.append(div);
}

function CreateLineDivSpace(parentStr, playersInRound, round){
    var parent = $('#'+parentStr);
    var id = 'none';
    var playersInNextRound = playersInRound*2;
    var height = ((cellSpace * numOfBasePlayers)-(pDivHeight*playersInNextRound))/Math.pow(2,round)+5.3+ 'px';
    var width = lDivWidth + 'px';

    CreateDiv(parent, id, height, width);
}

function CreateLineDiv(parentStr, playersInRound, round, placement){
    var parent = $('#'+parentStr);
    var id = 'l'+round+'d'+placement;
    var playersInNextRound = playersInRound*2;
    var height = (((cellSpace * numOfBasePlayers)-(pDivHeight*playersInNextRound))/Math.pow(2,round)+(2*pDivHeight))-14.15 + 'px';
    var width = lDivWidth + 'px';

    CreateDiv(parent, id, height, width);


    var lineDiv = $('#'+id);
    lineDiv.css('border-top', 'solid');
    lineDiv.css('border-right', 'solid');
    lineDiv.css('border-bottom', 'solid');
    lineDiv.css('border-width', '2px');
    lineDiv.css('border-color', 'white');

}

function CreateSpaceDiv(parentStr, playersInRound, round, sectionStr){

    var parent = $('#'+parentStr);
    var id = 'none';
    var height;
    var width = pDivWidth-3 + "px"; //subtract 3 to increase space between live div

    if(sectionStr  == 'a'){
        height = (((cellSpace * numOfBasePlayers)-(pDivHeight*playersInRound))/Math.pow(2,round)+.3)/2 + 'px';
    }else{height = ((cellSpace * numOfBasePlayers)-(pDivHeight*playersInRound))/Math.pow(2,round)+.3+ 'px';}

    CreateDiv(parent, id, height, width);
}

function CreatePlayerDiv(parentStr, round, placement){
    var parent = $('#' + parentStr);
    var id ="r" + round + "p"+ placement;
    var height = pDivHeight + "px";
    var width = pDivWidth + "px"; //subtract 3 to increase space between live div
    var evenOrodd;

    CreateDiv(parent, id, height, width);
    var playerDiv = $('#'+id);
    playerDiv.css('background-image','url("BracketSquare.png")');
    playerDiv.css('font-size', 'small');



    //sets BracketSquare to 1 or 0 to help with player advancement
    if((placement % 2)==0){evenOrodd = 0;}
    else{evenOrodd = 1;}
    playerDiv.attr('title', evenOrodd);


}

function CreateAddRound(parentStr){
    numOfPlayersLeft = numOfPlayersLeft * 2;
    var parent  = $('#' + parentStr);
    var playerId = 'AddPlayerDiv';
    var lineId = 'AddLineDiv';
    var height = cellSpace *numOfBasePlayers + 'px';
    var playerWidth = pDivWidth + 'px';
    var lineWidth = lDivWidth + 'px';

    var playersInRoundHolder = Math.pow(2,numOfBaseRounds);

    CreateDiv(parent, lineId, height, lineWidth);
    CreateDiv(parent, playerId,height, playerWidth);

    for(var i = 0;i < numOfPlayersLeft; i++){
        CreateSpaceDiv(playerId, playersInRoundHolder, numOfBaseRounds, 'a');
        CreatePlayerDiv(playerId, numOfBaseRounds+1,i);
        CreateSpaceDiv(playerId, playersInRoundHolder, numOfBaseRounds, 'a');

        if(i % 2 != 0){
            var lid = $('#'+lineId);
            CreateDiv(lid,'none','13.5px',lineWidth);
            CreateDiv(lid, 'p'+i, '30px', lineWidth);
            CreateDiv(lid, 'none', '13.5px', lineWidth);
            var ldivid = $('#p'+i);
            ldivid.css('border-top','solid');
            ldivid.css('border-right','solid');
            ldivid.css('border-bottom','solid');
            ldivid.css('border-width','2px');
            ldivid.css('border-color', 'white');
        }
    }
}

function CreateRoundDiv(parentStr,round){
    var parent = $('#' + parentStr);
    var id = 'rd' + round;
    var id2 = 'rl' + round;
    var height = cellSpace * numOfBasePlayers + 'px';
    var width = pDivWidth + 'px';
    var width2 = lDivWidth + 'px';
    CreateDiv(parent, id, height, width);

    var playersInRound = Math.pow(2,round-1);
    for(var i = 0; i < playersInRound; i++){
        CreateSpaceDiv(id, playersInRound, round, 'b');
        CreatePlayerDiv(id, round, i);  //include b within id to separate base from 1st round div
        CreateSpaceDiv(id, playersInRound, round, 'b');
    }

    var n = 0;
    if(round != numOfBaseRounds){CreateDiv(parent, id2, height, width2);} //Container to hold lines and line space divs

    while((n < playersInRound) && (round != numOfBaseRounds)){
        CreateLineDivSpace(id2, playersInRound,round+1);
        CreateLineDiv(id2, playersInRound, (round), n);
        CreateLineDivSpace(id2, playersInRound, round+1);
        n++;
    }

}

function CreateBracket() {
    //calculates and sets the numRounds variable
    GetNumRounds();

    //set parent node of bracket div, height, and width
    var parent = $('Body');
    var height = (cellSpace * (numOfBasePlayers*2)) + 'px';
    var baseWidth = (numOfBaseRounds * pDivWidth) + (numOfBaseRounds * lDivWidth) - 8 + 'px'; //Minus 8 to account for something

    if(additionalRound == true){
        var addWidth = pDivWidth+lDivWidth + 'px';
        var addHeight = (cellSpace * (numOfBasePlayers*2)) + 'px';
        var addRound =  $('<div>', { id: 'Add'});
        addRound.css('height', addHeight);
        addRound.css('max-height', addHeight);
        addRound.css('width', addWidth);
        addRound.css('max-width', addWidth);
        addRound.css('position', 'relative');
        addRound.css('float', 'left');

        parent.append(addRound);
    }

    //the container to hold entire base bracket
    var baseRounds =  $('<div>', { id: 'Base'});
    baseRounds.css('height', height);
    baseRounds.css('max-height', height);
    baseRounds.css('width', baseWidth);
    baseRounds.css('max-width', baseWidth);
    baseRounds.css('position', 'relative');
    baseRounds.css('top', '0px');
    baseRounds.css('float', 'left');
    parent.append(baseRounds);

    //Loops from last round until first
    for(var i = 1; i <= numOfBaseRounds; i++){
        CreateRoundDiv('Base', i); //Create a round with parent 'bracketDiv' and i as round#
    }

    numOfPlayersLeft = numOfPlayers - numOfBasePlayers;
    if(additionalRound == true) {
        CreateAddRound('Add');
    }

    PopulateBracket();
}