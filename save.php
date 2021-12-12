<?php

$connection = require_once './Connection.php';

$connection->addNote($_POST);

// 轉址
header('Location: index.php');