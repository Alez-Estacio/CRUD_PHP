<?php
//front controller 
require_once "models/database.php";
//echo $_GET['controller'];
session_start();
if(isset($_SESSION['user']) || (isset($_POST['email']) && isset($_POST['password']))){ //esto valida que se necesite una sesion iniciada o hacer login para usar cualquier metodo 
if(!isset($_GET['c']))
{
    require_once 'Controllers/home.controller.php';
    $controller= new HomeController();
    call_user_func(array($controller, "index")); 

}else{
    $controller=$_GET['c'];
    require_once "controllers/$controller.controller.php";
    $controller = ucwords($controller)."Controller";
    $controller = new $controller;
    $action = isset($_GET['a']) ? $_GET['a'] : 'index'; //operador ternario
    call_user_func(array($controller,$action)); 
} 
}else { // si no se cumple la condicion reenvia al login 
    require_once 'controllers/user.controller.php';
    $controller= new UserController();
    call_user_func(array($controller, "login")); 
}



