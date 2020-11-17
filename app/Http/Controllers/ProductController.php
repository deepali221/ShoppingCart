<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Session;
use Auth;

class ProductController extends Controller
{
    public function getIndex(){
        $products = Product::all();
        return view('shop.index',['products'=> $products]);
    }

    public function addToCart(Request $request, $id){
      $product = Product::find($id);
      $oldCart = Session::has('cart') ? Session::get('cart') : null ;
      $cart = new Cart($oldCart);
      $cart->add($product, $product->id);

      $request->session()->put('cart', $cart);
      $request->session()->flash('showMsg' , 'New product has been added to your cart.');

      return redirect()->route('product.index');
    }

    public function removeFromCart(Request $request, $id){
      $oldCart = Session::has('cart') ? Session::get('cart') : null ;
      $cart = new Cart($oldCart);
      $cart->remove($id);

      $request->session()->put('cart', $cart);
      $request->session()->flash('showMsg' , 'Product has been removed from the cart.');

      return redirect()->route('product.shoppingCart');
    }

    public function getCart(){
      if(!Session::has('cart')){
        return view('shop.shopping-cart');
      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      return view('shop.shopping-cart',['products' => $cart->items,'totalPrice' => $cart->totalPrice,'totalQty'=>$cart->totalQty]);
    }

    public function getCheckout(){
      if(!Session::has('cart')){
        return view('shop.shopping-cart');
      }
      if(Auth::check()){
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout',['total'=> $total]);
      }
      Session::put('checkout',true);
      return redirect()->route('user.signin');
    }
}
