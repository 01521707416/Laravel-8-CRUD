@extends('template.master')
@section('content')

<div class="row m-5">
<div class="col-lg-12 m-auto">
    <div class="card">
        <div class="card-header text-center">
            <h3>Add Products Table</h3>
        </div>
        @if(session('success'))
        <strong class="text-success m-3">{{session('success')}}</strong>
        @endif
        <div class="card-body">
            <form action="{{route('product')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="" class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="product_name">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="" class="form-label">Product Price</label>
                            <input type="text" class="form-control" name="product_price">
                            @error('product_price')
                            <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="" class="form-label">Product Category</label>
                            <input type="text" class="form-control" name="product_category">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="" class="form-label">Short Description</label>
                            <textarea name="short_desp" id="" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="" class="form-label">Product Preview</label>
                            <input type="file" class="form-control" name="preview" multiple>
                        </div>
                        @error('preview')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="col-lg-12 text-center">
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm shadow mr-2" type="submit" >Add Product</button>
                            <button class="btn btn-danger btn-sm shadow ml-2" type="reset" >Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

           
        </div>
    </div>
</div>

@endsection