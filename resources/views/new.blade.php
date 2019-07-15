@extends('layouts.template')

@section('content')
   
    <div class="container">
        <h1>Add New Item </h1>
        <form  action="/posts" method="POST" enctype="multipart/form-data" >
            {{ csrf_field() }}
            {{ method_field('POST') }}

            <div class="form-group">
                <label for="title">Item Title </label>
                <input type="text" name="title" placeholder="Post Title" class="form-control" id="title"/>
            </div>
            <div class="form-group">
                <label for="desc">Item Description </label>
                <textarea name="desc" class="form-control" id="desc" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="file">Upload Image </label>
                <input type="file" name="image" class="form-control-file" id="file"/>
            </div>

            <div class="form-group">
                <label for="price">Price </label>
                <input type="text" name="price" placeholder="e.g 200$" class="form-control" id="price"/>
            </div>

            <div class="form-group">
                <label for="vend">Vender </label>
                <input type="text" name="vender" placeholder="vender e.g Ali" class="form-control" id="vend"/>
            </div>

            <div class="form-group">
                <label for="quan">Quantity </label>
                <input type="text" name="quantity" placeholder="e.g 50" class="form-control" id="quan"/>
            </div>


            <input type="submit" value="Submit" class="btn btn-primary"/>
            <br>
            <br>
            
        </form>
    </div>


@endsection
