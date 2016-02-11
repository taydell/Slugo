<?php
/**
 * Created by PhpStorm.
 * User: wilson
 * Date: 4/16/2015
 * Time: 12:30 PM
 */
global $conn;
$query = $conn->query('SELECT * FROM games');

class AdminGames
{

    public function getArray()
    {
        global $query;
        $games = array();

        return $games = $query->fetchAll(PDO::FETCH_ASSOC);

    }

    public function addGames($gameName, $gameBanner, $playerCount, $description, $maxPlayers)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "acm_slugo";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // sql to add a record
            $sql = "INSERT INTO games (game_name, game_banner, player_count, description, [max players])
            VALUES ($gameName, $gameBanner, $playerCount, $description, $maxPlayers)";
            $conn->exec($sql);
            echo "New game created successfully";
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }
        //add new games into the database

    }

    public function removeGames($gameID)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "acm_slugo";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // sql to delete a record
            $sql = "DELETE FROM games WHERE id = $gameID";

            // use exec() because no results are returned
            $conn->exec($sql);
            echo "game deleted successfully";
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }

        //remove games from database

    }

    public function updateGames($gameId, $column)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "acm_slugo";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "UPDATE games SET $column WHERE id = $gameId";

            // Prepare statement
            $stmt = $conn->prepare($sql);

            // execute the query
            $stmt->execute();

            // echo a message to say the UPDATE succeeded
            echo $stmt->rowCount() . " records UPDATED successfully";
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }
        //update games in database

    }

}
class AdminQueryDatabase
{

    public function getAll()
    {

        //get all tables from database

    }

}