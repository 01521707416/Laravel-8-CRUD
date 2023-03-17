@extends('template.master')
@section('content')

<div class="container">
    <div class="row m-4">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h3>Update Products</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-lg-8">
                            <label for="" class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="product_name" value="{{$product->product_name}}">
                        </div>
                        <div class="form-group col-lg-8">
                            <label for="" class="form-label">Price</label>
                            <input type="text" class="form-control" name="product_price" value="{{$product->product_price}}">
                            @error('product_price')
                            <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="form-group col-lg-8">
                            <label for="" class="form-label">Category</label>
                            <input type="text" class="form-control" name="category" value="{{$product->product_category}}">
                        </div>
                        <div class="form-group col-lg-8">
                            <label for="" class="form-label">Short Description</label>
                            <input type="text" class="form-control" name="short_desp" value="{{$product->short_desp}}">
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="" class="form-label">Product Preview</label>
                                <input type="file" class="form-control" name="preview" value="" multiple>
                            </div>
                            @error('preview')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <button class="btn btn-outline-success btn-sm shadow">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection