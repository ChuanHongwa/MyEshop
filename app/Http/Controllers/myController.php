<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class myController extends Controller
{
    public function index()
    {
        return view("home");
    }
    
    public function contact_us()
    {
        return view("contact_us");
    }
    
    public function login()
    {
        return "登入";
    }
    
    public function logout()
    {
        return "登出";
    }
    
    public function products()
    {
        return view("products");
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
        return view("products_details");
    }
    
    public function blog()
    {
        return "部落格";
    }
    
    public function blog_post()
    {
        return "部落格信箱";
    }
    
    public function search()
    {
        return "搜尋";
    }
    
    public function cart()
    {
        return "購物車";
    }
    
    public function checkout()
    {
        return "確認";
    }
    
    

    
}
