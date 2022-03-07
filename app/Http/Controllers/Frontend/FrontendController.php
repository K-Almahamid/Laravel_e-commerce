<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending', '1')->take(15)->get(); //where trending==1
        $trending_category = Category::where('papular', '1')->take(15)->get();
        return view('frontend.index', compact('featured_products', 'trending_category'));
    }

    public function category()
    {
        $category = Category::where('status', '')->get();
        return view('frontend.category', compact('category'));
    }

    public function viewcategory($slug)
    {
        if (Category::where('slug', $slug)->exists()) {
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('category_id', $category->id)->where('status', '0')->get();
            return view('frontend.products.index', compact('products', 'category'));
        } else {
            return redirect('/')->with('error', 'No such category found');
        }
    }

    public function viewproduct($category_slug, $prodoct_slug)
    {
        if (Category::where('slug', $category_slug)->exists()) // check if category exists
        {
            if (Product::where('slug', $prodoct_slug)->exists()) {
                $products = Product::where('slug', $prodoct_slug)->first();
                return view('frontend.products.view', compact('products'));
            } else {
                return redirect('/')->with('error', 'The link was broken');
            }
        } else {
            return redirect('/')->with('error', 'No such category found');
        }
    }
}
