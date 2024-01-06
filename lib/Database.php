<?php

include_once "config/config.php";
class Database
{
    public $host = HOST;
    public $user =  USER;
    public $pass = PASSWORD;
    public $databse = DATABASE;

    public $link;
    public $error;


    public function __construct()
    {
        $this->dbConnect();
    }

    public function dbConnect()
    {   
        // var_dump($this->host);
        $this->link = mysqli_connect($this->host, $this->user, $this->pass, $this->databse);

        if ( !$this->link) {
            // echo "This error";
            die("Connection failed: " . mysqli_connect_error());
        }else{
            echo 'Connnect success';
        }
    }

    public function insert($query){
        $result = mysqli_query($this->link,$query) or die($this->link->error.__LINE__);

        if($result) return $result;
    }

    public function show($query){
        $result = mysqli_query($this->link,$query) or die($this->link->error.__LINE__);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
          } else {
            echo "0 results";
          }
        if($data) return $data;
    }

    public function select($query){
        $result = mysqli_query($this->link,$query) or die($this->link->error.__LINE__);
       
            // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            return $row;
        }
        
        
    }

    public function del($query){
        $result = mysqli_query($this->link,$query) or die($this->link->error.__LINE__);

        if($result) return $result;
    }
}
