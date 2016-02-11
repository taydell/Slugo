<?php
/**
 * Created by PhpStorm.
 * User: wilson
 * Date: 3/3/2015
 * Time: 6:56 PM
 */

$query = $conn->query('SELECT * FROM developers');

class Developer_database_files
{
    private $id,
        $title,
        $name,
        $picture,
        $bio,
        $contactEmail,
        $contactPhone;

    public function __construct()
    {
        $this->id = 'id';
        $this->title = 'title';
        $this->name = 'name';
        $this->picture = 'picture';
        $this->bio = 'bio';
        $this->contactEmail = 'contactEmail';
        $this->contactPhone = 'contactPhone';
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

    //-- GETTERS AND SETTERS START--//


    //-- GETTERS AND SETTERS END--//
}