<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Post;
use App\cart;
class AjaxController extends Controller
{
    public function price(Request $request){
        if($request->ajax()){
            $value = $request->total;

            session(['total'=> $value]);

            try{
                $request->session()->forget('error');
            }catch(Exception $e){
                
            }

            return session('total');
        }
    }



    public function cart(Request $request){

        $id = $request->id;

        $intId = (int)$id;

        $post = Post::find($intId);
         
        //Post::find($intId)->update(['quantity',$post->quantity-1]);

        $q = $post->quantity-1;

        //Post::where('id',$intId)->update(['quantity',$q]);


        $exists = cart::find($intId);

        if($exists===null){
            $cart = new cart;

            $cart->title = $post->title;

            $cart->id = $post->id;

            $cart->price = $post->price;

            $cart->quantity = "1";

            
            $cart->save();
        }else{
            $count = (int)$exists->quantity;

            $exists->quantity = strval($count+1);

            $exists->save();
        }

        
        $post->quantity = $q;
        $post->save();
        return "Data saved";

    }
}
