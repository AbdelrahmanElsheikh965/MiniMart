<?php

include 'dbConfig.php';

class DataBase implements db
{
    public $connection;
    public function __construct(){
        if ($this->connection = new mysqli('', '', '', ''))
            return true;
        return $this->connection->connect_error();

    }

    public function Register($table, $name, $email, $password_1, $password_2)   // Interface Method
    {
        $name       = $this->connection->real_escape_string($name);
        $email      = $this->connection->real_escape_string($email);
        $password_1 = $this->connection->real_escape_string($password_1);
        $password_2 = $this->connection->real_escape_string($password_2);
        if($this->validate($table, $email) === "True" ){
            $password = (($password_1 === $password_2) && strlen($password_1) >= 8 ) ? base64_encode($password_1) : "NotMatch";
            if ($password !== "NotMatch"){
                $sql  = "INSERT INTO $table (name, email, password) VALUES ('$name','$email','$password')";
                $res  = $this->connection->query($sql);
                if ($res)
                    return "True";
                return "Error While Registration!";
            }else{
                return "Error - check email or password length should not be < 8";
            }   
        }else{
            return $this->validate($table, $email);
        }      
    }

    public function Login($table, $email, $password)               // Interface Method
    {
        $email    = $this->connection->real_escape_string($email);
        $password = $this->connection->real_escape_string($password);
        $password = base64_encode($password);
        $sql  = "SELECT email, password FROM $table WHERE email='$email' AND password='$password'";
        $res  = $this->connection->query($sql);
        if (mysqli_num_rows($res) == 1)
            return "True";
        return "False";
    }

    public function validate($table, $email){
        // A function to check for existence && validate email.
        $res = $this->connection->query("SELECT email FROM $table WHERE email='$email'");
        if (mysqli_num_rows($res) > 0)
            return "Email Already Registered!";
        return filter_var($email, FILTER_VALIDATE_EMAIL) ? "True" : "Enter Well-formatted Email";    
    }    

    public function view($table, $cols="*", $plus = "")
    {
        $Result = array();
        $sql = "SELECT $cols FROM $table " . $plus;
        $res  = $this->connection->query($sql);
        if (mysqli_num_rows($res) > 0)
            while($row = mysqli_fetch_assoc($res))
                $Result[] = $row;
                return $Result;
        return "No Data!";
    }

    public function __destruct(){
        return ($this->connection->close()) ? True : "Not Yet! - StiLL Open.";
    }
}
