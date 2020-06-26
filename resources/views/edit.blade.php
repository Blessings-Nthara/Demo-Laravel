@extends('layouts.app')

@section('content')

    <div class="wrapper create-product">
        <h1>Add a New Product</h1>
        <form action="/products/edit/{{$product->id}}" method="POST">
        @csrf
            <label for="product_name">Product Name</label>
            <input type="text" id="product_name" name="product_name" value={{$product->product_name}}>
            <label for="description">Description</label>
            <textarea name="description" id="descriptionbox" cols="30" rows="10">{{$product->description}}</textarea>
            <label for="stocknumber">Stock Number</label>
            <input type="number" name="stocknumber" value={{$product->stock_number}}>
            <label for="price">Price</label>
            <input type="number" name="price" value={{$product->price}}>
            <input type="submit" value="Update">
            

        </form>
    </div>
@endsection   