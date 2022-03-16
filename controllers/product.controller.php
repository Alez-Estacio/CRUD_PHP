<?php
require_once "models/product.php";
require_once "models/brand.php";

class ProductController
{
    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new Product();
    }

    public function index()
    {
        $brand = new Brand();
        $products = $this->model->list();
        require "views/header.php";
        require "views/product/main.php";
        require "views/footer.php";
    }

    public function form(){
        $product = new Product();
        $brand=new Brand();
        $brands=$brand->list();
        if(isset($_GET['id'])){
            $product = $product->getById($_GET['id']); 
        }
        require "views/product/form.php";
    }


    public function save() {
        $product = new Product();
        $id = intval($_POST['id']);
        if($id){
            $product = $product->getById($id);
        }
        
        $product->setName($_POST['name']);
        $product->setCost($_POST['cost']);
        $product->setPrice($_POST['price']);
        $product->setQuantity($_POST['quantity']);
        $product->setBrandId($_POST['brand_id']);

        $id ? $product->update() : $product->insert();

       // var_dump($product->insert());
        header('location:?c=product');
    }

    public function delete(){
        $product = new Product();
        $product=$product->getById($_GET['id']);
        $product->delete();
       header('location:?c=product');
    }
}