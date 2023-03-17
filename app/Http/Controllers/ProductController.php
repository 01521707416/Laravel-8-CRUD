<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    function add_products()
    {
        return view('products.productsIndex');
    }

    function insert(Request $request)
    {
        $request->validate([
            'preview' => 'image',
            'preview' => 'file|max:5120',
            'product_price' => 'integer',
        ]);

        $product_id = Product::insertGetId([
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_category' => $request->product_category,
            'short_desp' => $request->short_desp,
        ]);

        $uploaded_file = $request->preview;
        $extension = $uploaded_file->getClientOriginalExtension();
        $file_name = $product_id . '.' . $extension;
        Image::make($uploaded_file)->resize(280, 250)->save(public_path('/uploads/products/' . $file_name));

        Product::find($product_id)->update([
            'preview' => $file_name,
        ]);

        return back()->with('success', 'Product Added Successfully!');
    }

    function view()
    {
        $all_products = Product::all();
        $total_products = Product::count();
        return view('products.productsList', [
            'all_products' => $all_products,
            'total_products' => $total_products,
        ]);
    }

    function delete($product_id)
    {
        Product::find($product_id)->delete();
        return back()->with('delete_success', 'Product deleted successfully!');
    }

    function edit($product_id)
    {
        $id = $product_id;
        $product = Product::find($id);
        return view('products.productEdit', [
            'id' => $id,
            'product' => $product,
        ]);
    }

    function update(Request $request, $product_id)
    {
        $request->validate([
            'preview' => 'image',
            'preview' => 'file|max:5120',
            'product_price' => 'integer',
        ]);
        $id = $product_id;
        $data = array(
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'category' => $request->product_category,
            'short_desp' => $request->short_desp,
        );
        $product = Product::find($id);
        $product->update($data);

        $uploaded_file = $request->preview;
        $extension = $uploaded_file->getClientOriginalExtension();
        $file_name = $product_id . '.' . $extension;
        Image::make($uploaded_file)->resize(280, 250)->save(public_path('/uploads/products/' . $file_name));
        $preview = array('preview' => $file_name);
        $product->update($preview);

        return redirect(route('product.list'))->with('update_success', 'Product information updated successfully!');
    }
}
