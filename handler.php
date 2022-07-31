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

         case 'addNew':
            if(isset($_POST['name']) && isset($_POST['birth_date']) && isset($_POST['teacher']) && isset($_POST['start_date']) && isset($_POST['selectedValue']))
            {   
           
                $name = $_POST['name'];
                $birth_date = $_POST['birth_date'];
                $teacher = $_POST['teacher'];
                $start_date = $_POST['start_date'];
                $user_id = intval($_SESSION['user_id']);
                $group_id = intval($_POST['selectedValue']);

                
                $student = new Student(null, $name, $birth_date, $teacher, $start_date, $user_id, $group_id);
                

                $db->insert($student);
            }
            else
            {         
                echo 'Failed to add new student!';
            }
            break;                
        }

    }
?>