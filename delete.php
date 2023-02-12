<?php

require_once "database.php";

$id = $_GET["id"] ?? null;

if(!empty($id)) {
    $sql = "DELETE FROM `inventaires` WHERE `inventaires`.`id` = $id;";
        
    $inventaireStatement = $db->prepare($sql);
    $inventaireStatement->execute();
}

header('Location: inventaire.php');
exit;