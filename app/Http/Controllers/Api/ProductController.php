<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Requests\ProductRequest;

use App\Repositories\EloquentProductRepository;


class ProductController extends Controller
{
    protected $productInterface;
    protected $productService;

    public function __construct(EloquentProductRepository $productInterface,
     ProductService $productService)
    {
        $this->productInterface = $productInterface;
        $this->productService = $productService;
    }
    public function allProductApi()
    {
     
        $getProducts = $this->productInterface->getAllProducts();
        $allProducts = collect($getProducts)->map(function ($product) {

            $imageFilename = $product['image'];
            $relativePath = 'admin/images/admin_photos/products/medium/' . $imageFilename;
            $imageUrl = asset('storage/' . $relativePath);
            return [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'image' => $imageUrl,
            ];
        });

        return response()->json([
            'products' => $allProducts,
        ]);
    }

    public function storeProduct(ProductRequest $request){
        $data = $request->all();
        $imageName = $this->productService->productImage($data ,$request);
        $data['image'] = $imageName;
        $data['user_id'] = 1;
        $this->productInterface->productStore($data);

        return response()->json(['data' => $data, 'message' => 'Product stored successfully']);
    }

    public function editProduct($id){

       $product = $this->productInterface->getProductById($id);

        return response()->json([
            'product' => $product,
        ]);
    }

    public function editStoreProduct(ProductRequest $request, $id){

        $data = $request->all();
        $imageName = $this->productService->productImage($data ,$request);
        $data['image'] = $imageName;
        $data['user_id'] = 1;
        $this->productInterface->updateProduct($data ,$id);
    }

    public function deleteProduct($id){
        
        $this->productInterface->deleteProduct($id);
        return response()->json(['message' => 'Product deleted successfully']);
    }
 
    public function productDetail($id) {
        $product = $this->productInterface->getProductById($id);
    
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $imageFilename = $product['image'];
        $relativePath = 'admin/images/admin_photos/products/medium/' . $imageFilename;
        $imageUrl = asset('storage/' . $relativePath);
        
        return response()->json([
            'product' => $product,
            'image_url' => $imageUrl,
        ]);
    }


}
