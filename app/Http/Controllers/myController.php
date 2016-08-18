<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use Request;
use App\Http\Requests;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;


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
        return view("products", ["title" => "Products","products" => $this->products, "category" => $this->category, "brands" => $this->brands]);
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
    
   public function cart(Request $request) {
        if (Request::isMethod('post')) {
            $product_id = Request::get('product_id');
            $product = Product::find($product_id);
            Cart::add(array('id' => $product_id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price));
        }
       
        if( Request::get("product_id") && (Request::get("add") == 1))
        {
            $items = Cart::Search(function ($cartItem, $rowId) { return $cartItem->id == Request::get("product_id");});
            Cart::update($items->first()->rowId, $items->first()->qty + 1);
        }

        if( Request::get("product_id") && (Request::get("minus") == 1))
        {
            $items = Cart::Search(function ($cartItem, $rowId) { return $cartItem->id == Request::get("product_id");});
            Cart::update($items->first()->rowId, $items->first()->qty - 1);
        }
       
        if( Request::get("product_id") && (Request::get("clear") == 1))
        {
            $items = Cart::Search(function ($cartItem, $rowId) { return $cartItem->id == Request::get("product_id");});
            Cart::remove($items->first()->rowId);
        }
       
    
        $cart = Cart::content();
       

        return view("cart", ["title" => "Cart", "comments" => "網頁說明", "cart" => $cart]);
    }
  
  public function cart_add(Request $request)
    {
        $product_id = Request::get("product_id");
        $product = \App\Product::find($product_id);

        Cart::add(["id" => $product_id,
                    "name" => $product->name,
                    "qty" => 1,
                    "price" => $product->price]);

        $cart = Cart::content();

//        return view("cart", ["cart" => $cart, "title" => "Cart", "description" => "網頁說明"]);
        return Redirect::to("cart")->with(["cart_from_server" => $cart, "title" => "Cart", "" => "網頁說明"]);
    }
    
    public function clear_cart()
    {
        Cart::destroy();

        return Redirect::to("cart");
    }
    
    public function checkout()
    {
        return view("checkout", ["title" => "Checkout"]);
    }
    
    
    
    
    
    
    
    
    
    
    

    
}
