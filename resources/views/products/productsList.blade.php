@extends('template.master')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Fontawesome Link --}}
    <script src="https://kit.fontawesome.com/91662dfc40.js" crossorigin="anonymous"></script>
    <title>Products List</title>
</head>
<body>

    <div class="m-4 flex d-flex flex-column">
        <span class="ml-2">Total Products: {{$total_products}}</span>
        <div class="mt-3 ml-2">
        <button class="btn btn-primary btn-sm" type="button"><a href="{{url('productsIndex')}}" class="text-decoration-none text-white">Add Product</a></button>
        </div>
    </div>
    <div class="row m-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Products List</h3>
                    @if(session('delete_success'))
                    <strong class="text-success">{{session('delete_success')}}</strong>
                    @endif
                    @if(session('update_success'))
                    <strong class="text-success">{{session('update_success')}}</strong>
                    @endif
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL No.</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Short Description</th>
                                <th>Products Preview</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_products as $key=>$product)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->product_price}}</td>
                                <td>{{$product->product_category}}</td>
                                <td>{{$product->short_desp}}</td>
                                <td><img src="{{asset('/uploads/products')}}/{{$product->preview}}" alt=""></td>
                                <td>
                                    <div class="text-center">
                                    <a href="{{route('product.edit', $product->id)}}" class="btn btn-outline-primary shadow btn-xs mb-2"><i class="fa-solid fa-edit"></i></a>

                                    <a href="{{route('product.delete', $product->id)}}" class="btn btn-outline-danger shadow btn-xs mt-2"><i class="fa-solid fa-trash-can"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

@endsection