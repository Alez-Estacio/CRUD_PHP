<?php


class HomeController
{
    function index(){
        require "views/header.php";
        require "views/product/main.php";
        require "views/footer.php";
    }
    function test(){
        var_dump(Database::Connect());
    }
}