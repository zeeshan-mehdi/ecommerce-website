<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Post;
use App\cart;


class PagesController extends Controller
{
    public function homePage(){
        return redirect('/posts');
    }

    public function newPostPage(){

        return view('new');
    }
    public function aboutPage(){
        return view('about');
    }


    public function checkoutPage(){
        $value = session('total');

        if($value==0){
            redirect('/cart');
        }

        return view('checkout')->with('value',$value);
    }

    public function cartCheckout(){
        $cart = cart::all();
        return view('cart')->with('cart',$cart);
    }
    
}

