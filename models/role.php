<?php

 class Role
{
    private ?int $id=null;
    private ?string $name=null;
   

    private $connection;

    function __CONSTRUCT()
    {
    $this->connection = Database::Connect();
  
    }
    public function getById($id){
        try{
        $query= "SELECT * FROM roles where id=?;";
        $query= $this-> connection-> prepare($query);
        $query->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        $query->execute(array($id));
        return $query->fetch();

    }catch(Exception $e){
        die($e->getMessage());
        }
    }
    public function getId()
    {
        return $this->id;
    }
    public  function setId($id)
    {
        $this->id = $id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->ename = $name;
    }

}