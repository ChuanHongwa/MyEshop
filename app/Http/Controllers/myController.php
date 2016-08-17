<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class myController extends Controller
{
    var $products;
    var $category;
    var $brands;
     
    public function __construct()
    {
        $this->products = \App\Product::all(["id", "name", "price"]);
        $this->category = \App\Category::all(["name"]);
        $this->brands = \App\Brand::all(["name"]);
    }
    
    public function index()
    {
//        $product = new \App\Product();
//        $product->name = "testhello~~ 從 Controller 123";
//        $product->save();
        return view("home", ["title" => "Home","products" => $this->products, "category" => $this->category, "brands" => $this->brands]);
    }
    
    public function contact_us()
    {
        return view("contact_us", ["title" => "Contact"]);
    }
    
    public function login()
    {
        return view("login", ["title" => "Login"]);
    }
    
    public function logout()
    {
        return "登出";
    }
    
    public function products()
    {
        return view("products", ["title" => "Products"]);
    }
    
    public function products_category()
    {
        return "商品目錄";
    }
    
    public function products_brands()
    {
        return "商品品牌";
    }
    
    public function products_details()
    {
        return view("products_details", ["title" => "Products_Details"]);
    }
    
    public function blog()
    {
        return "部落格";
    }
    
    public function blog_list()
    {
        return view("blog_list", ["title" => "Blog_List" , "i" => 4]);
    }
    
    public function blog_single()
    {
        return view("blog_single", ["title" => "Blog_Single"]);
    }
    
    public function blog_post()
    {
        return view("blog_single", ["title" => "Blog_Single"]);
    }
    
    public function search()
    {
        return "搜尋";
    }
    
    public function cart()
    {
        return view("cart", ["title" => "Cart"]);
    }
    
    public function checkout()
    {
        return view("checkout", ["title" => "Checkout"]);
    }
    
    

    
}
