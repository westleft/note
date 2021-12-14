<?php

$connection = require_once './Connection.php';

$id = $_POST['id'] ?? "";

if($id){
    $connection->updateNote($id, $_POST);
} else {
    $connection->addNote($_POST);
}

// 轉址
header('Location: ../index.php');