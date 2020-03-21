<?php

session_start();
require 'connect.php';

if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
    header('Location: login.php');
    exit;
}

echo "nauczyciel";