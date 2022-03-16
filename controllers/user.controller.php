<?php

require_once "models/user.php";
require_once "models/role.php";

class UserController
{
private $model;

function __CONSTRUCT()
{
    $this->model = new User(); 
}

function index()
{
    $user = new User(); //?
    $role = new Role();
    $users = $user->list();
    require "views/header.php";
    require "views/user/main.php";
    require "views/footer.php";
}
function form()
{
    require"views/header.php";
    require"views/user/form.php";
    require"views/footer.php";
}
function save()
{
    $user = new User();
    $id=intval($_POST['id']);   
    if($id)
    {
        $user = $user->getById($id);
    }  
    $user->setEmail($_POST['email']);
    $user->setPassword(password_hash($_POST['password'],PASSWORD_BCRYPT));//ciframos el id
    $user->setName($_POST['name']);
    $user->setRole_Id($_POST['role_id']);
    $user->setState(1);
    $id?$user->update(): $user->insert();
    header("location:?c=user");


}
function login()
{
    require "views/user/formLogin.php";
}

function validate()
{
    $email= $_POST['email'];
    $password= $_POST['password'];
    if($this->model->login($email,$password))
    {
        header('location: index.php'); 
    }else{ 
        header('location: index.php?error');
    }
}

function logout()
{
    session_destroy();
    header('location: index.php'); 
}

function changeState(){
    
    $user = $this->model->getById($_GET['id']);
    $user->updateState();
    header("location:?c=user");
}
}