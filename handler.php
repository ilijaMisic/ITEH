<?php

require_once "database.php";
include "model/user.php";
include "model/student.php";

session_start();

$db = new Database();

if (isset($_POST['key'])) {
    switch($_POST['key']){
        case 'login':
            if(isset($_POST['username']) && isset($_POST['password'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                
                $user = new User(null, $username, $password);
        
                $db->login($user);
            }
            break;
        case 'logout':
            $db->logout();
            break;  
        }

    }
?>