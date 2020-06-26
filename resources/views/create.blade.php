@extends('layouts.app')

@section('content')
    <div class="wrapper create-product">
        <h1>Add a New Product</h1>
        <form action="/products/create" method="POST">
        @csrf
            <label for="product_name">Product Name</label>
            <input type="text" id="product_name" name="product_name">
            <label for="description">Description</label>
            <textarea name="description" id="descriptionbox" cols="30" rows="10"></textarea>
            <label for="stocknumber">Stock Number</label>
            <input type="number" name="stocknumber">
            <label for="price">Price</label>
            <input type="number" name="price">
            <input type="submit" value="Submit">
            

        </form>
    </div>
@endsection