<?php

require_once "model/dataToReturn.php";

class Database {
    public $conn;

    function __construct()
    {
        $this->conn = new mysqli('localhost', 'root', '', 'smart');

        if ($this->conn->connect_errno) {
            exit("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Login
    public function login(User $user)
    {
        $username = $this->conn->real_escape_string($user->username);
        $password = $this->conn->real_escape_string($user->password);

        $data = $this->conn -> query("SELECT * FROM users WHERE username='$username' AND password='$password'");

        if($data->num_rows == 0)
        {
            $query = $this->conn -> query("INSERT INTO users (username, password) VALUES('$username', '$password')");

            if($query)
            {
                $this->setUser($username, $password);
                exit('success');
            }
            else
            {
                exit('Failed to login!');
            }
        }
        else if($data->num_rows > 0)
        {   
            $this->setUser($username, $password);
            exit('success');
        }
        else
        {
            exit('Failed to login!');
        }


    }

    private function setUser($username, $password)
    {
        $sql = $this->conn->query("SELECT id FROM users WHERE username='$username' AND password='$password'");
        $result = $sql->fetch_row();
        $_SESSION['user_id'] = $result[0];
        $_SESSION['username'] = $username;
    }

    // Logout
    public function logout()
    {
        unset($_SESSION['loggedIn']);
        session_destroy();
        exit('success');
    }

     // Insert
     public function insert(Student $student)
     {
         $name = $this->conn->real_escape_string($student->name);
         $birth_date = $student->birth_date;
         $teacher = $this->conn->real_escape_string($student->teacher);
         $start_date = $student->start_date;
         $user_id = $student->user_id;
         $group_id = $student->group_id;
 
         $data = $this->conn -> query("SELECT * FROM students WHERE name='$name' AND group_id='$group_id' AND start_date='$start_date'");
 
         if($data->num_rows > 0)
         {
             exit("Student is already added!");
         }
         else
         {
             $result = $this->conn -> query("INSERT INTO students (name, birth_date, teacher, start_date, user_id, group_id) 
             VALUES('$name', '$birth_date', '$teacher', '$start_date', '$user_id', '$group_id')");
 
             if($result)
             {
                 exit('success'); 
             }
         }
     }


}
?>
