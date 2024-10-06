<?php 
require_once 'Mysql.php';

class Product extends Mysql{
    
    public function getAll(){
        $query ="SELECT *FROM products";
        $result = mysqli_query($this->conn ,$query);


        $products = [];
        if(!empty($result)){
            $products = mysqli_fetch_all($result , MYSQLI_ASSOC);
        }

        return $products;
        
    }

    public function getOne($id){
        $query ="SELECT *FROM products WHERE `id`=$id";
        $result = mysqli_query($this->conn ,$query);


        $products = [];
        if(!empty($result)){
            $products = mysqli_fetch_assoc($result);
        }

        return $products;
        
    }
    public function addproduct($name, $desc, $price, $img){
        $name = mysqli_escape_string($this->conn,$name);
        $desc = mysqli_escape_string($this->conn,$desc);
        $query = "INSERT INTO products(`name`,`desc`,`price`,`img`) values('$name','$desc','$price','$img')";
        $result = mysqli_query($this->conn , $query);

        if($result){
            return true;
        }
        return false;
    }
    public function updateproduct($name, $desc, $price, $img, $id){
        $name = mysqli_escape_string($this->conn,$name);
        $desc = mysqli_escape_string($this->conn,$desc);
        $query = "UPDATE products set `name`= '$name' ,`desc`='$desc' ,`price`='$price' ,`img`='$img' WHERE `id`= $id";
        $result = mysqli_query($this->conn , $query);

        if($result){
            return true;
        }
        return false;
    }
    public function delete($id){
        $query = "DELETE FROM products WHERE `id`='$id'";
        $result = mysqli_query($this->conn , $query);

        if($result){
            return true;
        }
        return false;
    }

}






?>