<?php
/**
 * Created by PhpStorm.
 * User: wilson
 * Date: 3/3/2015
 * Time: 6:56 PM
 */


//$gameTile = $query->fetch(PDO::FETCH_OBJ);

//while($gameTile = $query->fetch(PDO::FETCH_OBJ))
//{
//    echo $gameTile->game_name, '<br>';
//}
$query = $conn->query('SELECT * FROM games');

class game_database_files
{
    private $id;
    private $name;
    private $banner;
    private $count;
    private $description;

    public function __construct()
    {
        $this->id = 'id';
        $this->name = 'name';
        $this->banner = 'banner';
        $this->count = 'player count';
        $this->description = 'description';
    }
    public function getRows()
    {
        global $query;
        if ($query->rowCount()) {
            // get number of panels
            $rows = $query->rowCount();
        }
        return $rows;
    }

    public function getGameName($rows)
    {
        global $query;
        while($rows = $query->fetch(PDO::FETCH_OBJ))
        {
            return $rows->game_name;
        }
    }
    public function getGameBanner($rows)
    {
        global $query;
        while($rows = $query->fetch(PDO::FETCH_OBJ))
        {
            return $rows->game_banner;
        }
    }
    public function getArray()
    {
        global $query;
        $games = array();

        return $games = $query->fetchAll(PDO::FETCH_ASSOC);

    }

    //-- GETTERS AND SETTERS START--//
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {

        return $this->name;
    }

    //-- GETTERS AND SETTERS END--//
}