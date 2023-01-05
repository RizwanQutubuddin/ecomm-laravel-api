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
        return $req->input();//, $id];
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
}
