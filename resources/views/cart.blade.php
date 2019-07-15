@extends('layouts.template')

@section('content')

<div class="alert alert-danger" style="display:none;">
        Something went wrong
    </div>  

@if($cart && count($cart)>0)
    @php
        $totalPrice = 0 @endphp
    @foreach($cart as $item)
        <div class="row">{{$item->title." quantity : ".$item->quantity." price ".$item->price}}</div>
        @php $totalPrice +=(int)$item->quantity *(int)str_replace('$','',$item->price)@endphp
    @endforeach
    
    <input type="button" class="btn btn-success" value="Pay {{$totalPrice}} $"/>

    <script>

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $('.btn-success').click(function(){

            console.log('clicked');
            var isLoggedIn = "{{auth()->user()===null ? false: true}}";
            console.log(isLoggedIn);
            if(!isLoggedIn){
                window.location.href = "http://ecommerce-app.test/login";
                return;
            }
            //window.url = "http://ecommerce-app.test/login";

            $.ajax({
            url:'price',
            method:'POST',
            data:{'total' : {{$totalPrice}}},
            success:function(resp){
                console.log(resp);
                window.location.href = "http://ecommerce-app.test/stripe";
            },

            error:function(err){
                console.log(err);
                $errView = $('.alert-danger');
                $errView.text(err);
                $errView.show();
              
            }
        });
        });

        
    
    </script>

@endif    




@endsection




