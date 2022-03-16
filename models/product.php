<?php

class Product
{
    private ?int $id=null;
    private ?string $name=null; 
    private ?float $cost=null;
    private ?float $price=null;
    private ?int $quantity=null;
    private ?int $brand_id=null;

    private $connection;

    public function __CONSTRUCT(){
        $this->connection = Database::Connect(); 

    }

    public function list()
    {
        try{
            $query = $this->connection->prepare("SELECT * FROM PRODUCTS");
            $query->execute();
           // return $query->fetchAll(PDO::FETCH_OBJ); con este se traen registros como objeto generico
            return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);//con este mapea los registros que vienen de product y los convierte en objeto de tipo podruct y permite usar todos los metodos que estan ahi metidos 
        }catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function insert()
    {
        try{
        $query = "INSERT INTO products (name,cost,price,quantity,brand_id) VALUES (?,?,?,?,?);";
        $this -> connection-> prepare($query)
                            ->execute(array(
                                $this->name,
                                $this->cost,
                                $this->price,
                                $this->quantity,
                                $this->brand_id
                            ));
                            $this->id=$this->connection->lastInsertId();
                            return $this;
                        }catch(Exception $e){
                            die($e->getMessage());
                        }
                            
    }

    public function update()
    {
        try{
            $query = "UPDATE products SET
                            name = ?,
                            cost = ? ,
                            price = ?,
                            quantity = ?
                            brand_id=?
                            WHERE id = ?;";
            $this->connection->prepare($query)
                            ->execute(array(
                                $this->getName(),
                                $this->getCost(),
                                $this->getPrice(),
                                $this->getQuantity(),
                                $this->getBrandId(),
                                $this->getId()
 
                            ));
            return $this;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getById($id){
        try{
        $query= "SELECT * FROM products where id=?;";
        $query= $this-> connection-> prepare($query);
        $query->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        $query->execute(array($id));
        return $query->fetch();


    }catch(Exception $e){
        die($e->getMessage());
        }
    }
    public function delete(){
        try{
            $query= "DELETE FROM products WHERE id=?;";
            $this-> connection->prepare($query)
                            ->execute(array($this->id));
        }catch(Exception $e){
            die($e->getMessage());

        }
    }
    function getId() : ?int
    {
        return $this->id;
    }
    function setId(int $id)
    {
        $this->id = $id;
    }
    function getName() : ?string
    {
        return $this->name;
    }
    function setName(string $name)
    {
        $this->name = $name;
    }
    function getCost() : ?string
    {
        return $this->cost;
    }
    function setCost(string $cost)
    {
        $this->cost = $cost;
    }
    function getPrice() : ?string
    {
        return $this->price;
    }
    function setPrice(string $price)
    {
        $this->price = $price;
    }
    function getQuantity() : ?string
    {
        return $this->quantity;
    }
    function setQuantity(string $quantity)
    {
        $this->quantity = $quantity;
    }
    function getBrandId() : ?int
    {
        return $this->brand_id;
    }
    function setBrandId(int $brand_id)
    {
        $this->brand_id = $brand_id;
    }


}