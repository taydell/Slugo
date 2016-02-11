<?php

class swag
{
    public function GetAllGames()
    {
        return "SELECT * FROM game_table FETCH 'description'";
    }
}

