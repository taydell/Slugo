<?php


$query = $conn->query('SELECT * FROM  timages');

class Home_logic
{
private $mid,
$cid,
$name,
$path;

public function __construct()
{
$this->mid = 'mid';
$this->cid = 'cid';
$this->name = 'name';
$this->path = 'path';
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
}