<?php

try
{
    $db = new PDO('mysql:host=localhost;dbname=vapfactory;charset=utf8', 'admin', 'adminpwd');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}