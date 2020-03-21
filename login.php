<?php

session_start();
require 'connect.php';

    if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
            header('Location: index.php');
            exit();
    }
    if($_SESSION['type'] != 3){
        header('Location: index.php');
        exit();
    }
echo "admin";