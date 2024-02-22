<?php 
// app/Repositories/ProductRepositoryInterface.php

namespace App\Repositories;

interface ProductRepositoryInterface
{
    public function getAllProducts();
    public function getProductById($id);
    public function deleteProduct($id);
    public function productStore($data);
    public function updateProduct($data ,$id);
    
    
}
