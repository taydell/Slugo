<?php
/**
 * Created by PhpStorm.
 * User: wilson
 * Date: 3/3/2015
 * Time: 6:56 PM
 */


$query = $conn->query("SELECT * FROM tgallery");
$query2 = $conn->query("SELECT * FROM event");


class tGallery_database_files
{
    private $id,
        $name;

    public function __construct()
    {
        $this->id = 'id';
        $this->name = 'name';

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


    public function getArray()
    {
        global $query;
        $games = array();

        return $games = $query->fetchAll(PDO::FETCH_ASSOC);

    }
    public function getArrayImages()
    {
        global $query2;

        return $images = $query2->fetchAll(PDO::FETCH_ASSOC);
    }

    //-- GETTERS AND SETTERS START--//


    //-- GETTERS AND SETTERS END--//
}
