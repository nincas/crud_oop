<?php

//class Crud
class Crud {
    //private VARS
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db_name = "crud_db";

    //protected Connection VAR
    protected $connection;  

    //initialize function
    public function __construct(){
        //check if connection is okay
        try {
            $this->connection = new PDO('mysql:host=localhost;dbname='.$this->db_name.'', $this->user,$this->pass);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    //this function will read and return data from database
    public function Read(){
        $rows = $this->connection->query('SELECT * FROM data');
        return $rows;
    }

    //this function will save/insert data to database from user inputs
    public function Save($data){
        $email = $data['email'];
        $name  = $data['name'];
        $age   = $data['age'];

        $query = "INSERT INTO data(email,name,age)VALUES(:email,:name,:age)";
        $stmt  = $this->connection->prepare($query);
        $stmt->execute(['email'=>$email,'name'=>$name,'age'=>$age]);
    }

    //this will be called if details is loaded
    public function loadData($id){
        $query  = "SELECT * FROM data WHERE id=:id";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['id'=>$id]);
        return $stmt->fetch();
    }

    //this function will update the data based on given id parameter
    public function Update($data){
        $query  = 'UPDATE data SET email=:email,name=:name,age=:age WHERE id=:id';
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $data->id);
        $stmt->bindParam(':email', $data->email);
        $stmt->bindParam(':name', $data->name);
        $stmt->bindParam(':age', $data->age);
        $stmt->execute();
        return header("Location: ../../../index.php");
    }

    //this function will delete data from given id
    public function Delete($id){
        $query  = 'DELETE FROM data WHERE id=:id';
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        return header("Location: ../../../index.php");
    }
}

?>