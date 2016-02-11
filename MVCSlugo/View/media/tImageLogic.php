<?php


$query1 = $conn->query("SELECT * FROM timages");


class tImage_database_files
{
private $mid,
        $cid,
        $name,
        $path;

public function __construct1()
{
    $this->mid = 'mid';
    $this ->cid = 'cid';
    $this->name = 'name';
    $this->path = 'path';

}

public function getRows1()
{
    global $query1;
    if ($query1->rowCount()) {
    // get number of panels
    $rows1 = $query1->rowCount();
}
return $rows1;
}


public function getArray1()
{
    global $query1;
    $games = array();

    return $games = $query1->fetchAll(PDO::FETCH_ASSOC);

}

//-- GETTERS AND SETTERS START--//


//-- GETTERS AND SETTERS END--//
}