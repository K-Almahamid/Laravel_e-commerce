<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        //$products = Product::latest()->paginate(4);
        // $products = Product::paginate(4);
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function add()
    {
        $category = Category::all();
        return view('admin.product.add', compact('category'));
    }

    public function insert(Request $request)
    {
        $products = new Product(); //create object from model

        // for image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getclientoriginalextension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/products/', $filename); //save image in file in public/asstes/uploads/products
            $products->image = $filename; //store in database
        }

        // for the rest of data
        $products->category_id = $request->input('category_id');
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->small_description = $request->input('small_description');
        $products->description = $request->input('description');
        $products->original_price = $request->input('original_price');
        $products->selling_price = $request->input('selling_price');
        $products->tax = $request->input('tax');
        $products->quantity = $request->input('quantity');
        $products->status = $request->input('status') == TRUE ? '1' : '0';
        $products->trending = $request->input('trending') == TRUE ? '1' : '0';
        $products->meta_title = $request->input('meta_title');
        $products->meta_keywords = $request->input('meta_keywords');
        $products->meta_description = $request->input('meta_description');
        $products->save();

        return redirect('products')->with('status', "Product Added Successfully");
    }

    public function edit($id)
    {
        $products = Product::find($id);
        return view('admin.product.edit', compact('products'));
    }

    public function update(Request $request, $id)
    {
        $products = Product::find($id);

        if ($request->hasFile('image')) {
            $path = 'assets/uploads/products/' . $products->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getclientoriginalextension();
                $filename = time() . '.' . $ext;
                $file->move('assets/uploads/products', $filename); //save image in file in public/asstes/uploads/products
                $products->image = $filename; //store in database

            }
            $products->name = $request->input('name');
            $products->slug = $request->input('slug');
            $products->small_description = $request->input('small_description');
            $products->description = $request->input('description');
            $products->original_price = $request->input('original_price');
            $products->selling_price = $request->input('selling_price');
            $products->tax = $request->input('tax');
            $products->quantity = $request->input('quantity');
            $products->status = $request->input('status') == TRUE ? '1' : '0';
            $products->trending = $request->input('trending') == TRUE ? '1' : '0';
            $products->meta_title = $request->input('meta_title');
            $products->meta_keywords = $request->input('meta_keywords');
            $products->meta_description = $request->input('meta_description');
            $products->update();
            return redirect('products')->with('status', "Product Updated Successfully");
        }
    }
    public function destroy($id)
    {
        $products = Product::find($id);
        if ($products->image) {
            $path = 'assets/uploads/products/' . $products->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $products->delete();
        return redirect('products')->with('status', "Product Deleted Successfully");
    }
}
