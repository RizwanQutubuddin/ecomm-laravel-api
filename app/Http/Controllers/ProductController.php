<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function addProduct(Request $req)
    {
        $product = new Product;
        $product->name=$req->name;
        $product->file_path=$req->file('file')->store('products');
        $product->description=$req->description;
        $product->price=$req->price;
        $product->save();
        return $product;
    }
    function productsList()
    {
        $products = Product::all();
        return $products;
    }
    
    function product($id)
    {
        $products = Product::find($id);
        return $products;
    }

    function updateProduct(Request $req,$id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->name = $req->name;
            $product->price = $req->price;
            $product->description = $req->description;
            $product->file_path=$req->file('file')->store('products');
            $product->save();
            return ["message" => "Product has been updated successfully","result"=>201];
        } else {
            return ["message" => "Product has not updated","result"=>404];
        }
    }

    function deleteProduct($id)
    {
        $deleteProduct=Product::where('id', $id)->delete();
        if($deleteProduct){
            return ["message" => "Product has been deleted successfully","result"=>201];
        } else {
            return ["message" => "Product has not deleted","result"=>404];
        }
    }

    function search($key)
    {
        return Product::where('name',"Like", "%$key%")->get();
    }
}
