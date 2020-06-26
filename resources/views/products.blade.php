@extends('layouts.app')

@section('content')
    <h1>Products Home</h1>
    @auth<p><a href="/products/create">Add New Product</a></p>@endauth
    <form method="POST" action="/products/sort">
    @csrf
  <input type="radio" id="stocknumber" name="filter_type" value="stock_number">
  <label for="stocknumber">Stock Number</label><br>
  <input type="radio" id="productname" name="filter_type" value="product_name">
  <label for="productname">Product Name</label><br>
  <button type="submit">Filter</button>
</form> 
<form action="/products/filter" method="POST">
@csrf
    <label for="min">Min Price</label>
    <input type="number" name="min">
    <label for="max">Max Price</label>
    <input type="number" name="max">
    <input type="submit" value="filter">
    
</form>
<form action="/products/search" method="get">
  <label for="searchtype">Search:</label>
  <select   name="searchtype" id="cars">
    <option value="product_name">Search by product name</option>
    <option value="description">Search by description</option>
  </select>
  <input type="text" name="item">
  
  <input type="submit" value="Search">
</form>    
<table cellpadding="0" cellspacing="0" border="0">
    <thead class="tableheader">
    <tr>
    <th>Product Name</th>
    <th>Description</th>
    <th>Stock Number</th>
    <th>Price($)</th>
    </tr>
    </thead> 
    <tbody class="tablecontent">
    @foreach($products as $product)
     <tr>
     <td>
     {{$product->product_name}}
     </td>
     <td>
     {{$product->description}}
     </td>
     <td>
     {{$product->stock_number}}
     </td>
     <td>
     {{$product->price}}
     </td>
     <td>
     @auth
     <form action="/products/edit/{{$product->id}}" class="form-inline" method="GET">
     <button type="submit" class="editbutton">Edit</button>
     </form>
    <form action="/products/{{$product->id}}" method="POST" class="form-inline">
    @csrf
    @method("DELETE")
    <button type="submit" class="button1">Delete</button></form>@endauth
     </td>
     </tr>
    @endforeach
    </tbody> 
    </table> 
    @endsection