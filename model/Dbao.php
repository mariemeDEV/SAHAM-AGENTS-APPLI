<?php

 class  DBao{
    protected  $instance;
    private $db;
    function __construct($db='')
    {
        $this->db = $db;
       // $instance=new DBao();
    }
    public  function  getConnection(){
        $dns="mysql:host=127.0.0.1;dbname=saham_app_1";
        $user="root";
        $password="";
        try{
            $this->db=new PDO($dns,$user,$password);
        }catch (PDOException $ex){
        die($ex->getMessage());
        }
        return $this->db;
    }
    public  function  executeMAJ($sql){
     $instance=new DBao();
        $conn=$instance->getConnection();
        return $conn->exec($sql);
    }
   public  function  executeSELECT($sql){
        $connection=new DBao();
        $conn=$connection->getConnection();
        return $conn->query($sql);
    }

    public function getError(){
        $conn=$this->getConnection();
        print_r($conn->errorInfo()); 
    }
}
?>
