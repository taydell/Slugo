<?php
/**
 * Created by PhpStorm.
 * User: wilson
 * Date: 5/4/2015
 * Time: 5:17 AM
 */

$query = $conn->query('SELECT * FROM users');

class user_database_files
{

    public function getArray()
    {
        global $query;
        $users = array();

        return $users = $query->fetchAll(PDO::FETCH_ASSOC);

    }

}