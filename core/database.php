<?php
class database{
    public $conn;
 

public function __construct()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ctg-cls-6";

try {
    $this->conn= new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    echo "Connected successfully";
} catch(PDOException $e) {

  echo "Connection failed: " . $e->getMessage();
}
}

public function datawrite($sql){
    $statement = $this->conn->prepare($sql);
    $statement->execute();
}
public function datasave($sql)
{
    $statement = $this->conn->prepare($sql);
    $statement->execute();
}

public function dataread($sql){
    $statement = $this->conn->prepare($sql);
    $statement->execute();
    return $statement->fetchAll();

}
public function datareadsingle($sql){
    $statement = $this->conn->prepare($sql);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);

}
}


?>