<?php
include 'database.php';
class user extends database{

    public function saveuser($name,$email,$password){
        $sql="INSERT INTO users (username,email,password) values('$name','$email','$password')";
        $this->datawrite($sql);

    }

    public function logincheck($username ,$password){
        $password=md5($password);
        $sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
        return $this->dataRead($sql);
    
    }

}

?>


















