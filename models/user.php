<?php

 class User
{
    private ?int $id=null;
    private ?string $email=null;
    private ?string $password=null;
    private ?string $name=null;
    private ?string $role_id=null;
    private ?int $state=null;

    private $connection;

    function __CONSTRUCT()
    {
    $this->connection = Database::Connect();
  
    }

    public function list()
    {
        try{
            $query = $this->connection->prepare("SELECT * FROM users");
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
        $query = "INSERT INTO users (email,password,name,role_id,state) VALUES(?,?,?,?,?);";
        $this->connection->prepare($query)
                         ->execute(array(
                             $this->email,
                             $this->password,
                             $this->name,
                             $this->role_id,
                             $this->state
                         ));
    $this->id = $this->connection->lastInsertId();
    return $this;
    }catch(\Throwable $th){ //
        die($e->getMessage());
    }
}
    public function login ($email, $password) : bool 
    {
          //  die(var_dump($this));
        try{
            $query = $this->connection  -> prepare("SELECT * FROM users WHERE email=?;");
            //prepare("SELECT * FROM users WHERE email=?;");
            $query->setFetchMode(PDO::FETCH_CLASS,__CLASS__); /*devuelve una nueva instancia de la clase solicitada, 
                                                                haciendo corresponder las columnas del conjunto de 
                                                                resultados con los nombres de las propiedades de la clase,
                                                                 y llamando al constructor después*/
                                                            //fetch es un conjunto de rsultados asociado al objeto pdo
            $query->execute(array(                             //pdo es para acceder a las funcions para hacer consultas y sacra datos de las bd
                            $email
                                ));
            $result=$query->fetch();
            $result->connection = ''; 
            if(password_verify($password, $result->getPassword()))// metodo para verificar la contraseña, compara el password que estamos ingresando con el que esta en la bd
                                {
                                    $_SESSION['user']=$result;
                                    return true;
                                }else{
                                    session_destroy();
                                    return false;
                                }

        }catch(Exception $e){
            die($e->getMessage());
        } //QUEDAMOS EN 1:04:47
    }
   /* public function actualizarEstado($state) : bool// me toco dejarllo sin public pq sacaba error 
   {
    $query = $this->connection  -> prepare("Update users Set state='$state' Where id ='$id';");
    //Update users Set state= 0 Where name= "LauraC";
   
   }
*/
   public function updateState()
   {
       try{
           $query="UPDATE users SET state =? WHERE id = ?;";
           $this->connection->prepare($query)
           ->execute(array(
               !$this->state,
               $this->id
           ));
        return $this;
       }catch(Exception $e){
           die($e->getMessage());
       }
   }
   public function getById($id)
    {
        try {
            $query = "SELECT * FROM users where id=?;";
            $query = $this->connection->prepare($query);
            $query->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
            $query->execute(array($id));
            return $query->fetch();
        } catch (Exception $e) {
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
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getRole_Id()
    {
        return $this->role_id;
    }
    public function setRole_Id($role_id)
    {
        $this->role_id = $role_id;
    }
    public function getState()
    {
        return $this->state;
    }
    public function setState($state)
    {
        $this->state = $state;
    }
}