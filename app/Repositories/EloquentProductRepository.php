<?php 
// app/Repositories/EloquentProductRepository.php

namespace App\Repositories;

use App\Models\Product;
use App\Services\ProductService;

class EloquentProductRepository implements ProductRepositoryInterface
{
    protected $productService;

    public function __construct( ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function getAllProducts()
    {
        return Product::get()->toArray();
    }


    public function getProductById($id)
    {
        return Product::find($id);
    }


    public function productStore($data){
        $product = Product::create($data);
        return $product;

    }
 
    public function updateProduct($data ,$id){
        $product = Product::findOrFail($id);
        $product->update($data);
        return $product;
        
    }

    public function deleteProduct($id){
        $product = Product::findOrFail($id);
        $product->delete();
    }

}
