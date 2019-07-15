@extends('layouts.template')

@section('content')
@include('layouts.slider')

<div class="alert alert-success" style="display:none;">
        Item Added to cart
    </div>    
    <div class="alert alert-danger" style="display:none;">
        Something went wrong
    </div>  

@if($posts && count($posts)>0)

    @foreach($posts as $item)

        @if($loop->index%3==0)
            <div class="row">
        @endif    
        <div class="col-md-4 item">
        <div class="thumbnail">
        <a href="/posts/{{$item->id}}">
            <img src="/storage/images/{{$item->image}}" alt="Lights" style="width:100%">
            <div class="caption">
                <p class="title">{{$item->title."  ".$item->price}}</p>
                
            </div>
        </a>
        <a class="btn btn-success" id="{{$item->id}}">Add to Cart</a>
        </div>
        </div>

        @if(!$loop->first && $loop->index%3==0)
            </div>
        @endif




        <script type="text/javascript">
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
          $('a.btn-success').off().click(function(e){
            
            var url = "cart";
            

            
             $.ajax({
                 type:'POST',
                 url:url,
                 data:{id:$(this).attr('id')},
                 success:function(data){
                     $('.fas').css('color', '#38c172');
                     $('.alert-success').show();
                 },
                 error:function(error){
                    $('.alert-danger').show();
                 }
                
             });
          });

        </script>
    @endforeach
    


@endif    




@endsection




