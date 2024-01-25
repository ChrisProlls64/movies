<?php

function getUser() 
{
    global $db;
    $sql = 'SELECT id, email FROM users';
    $query = $db->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);

}