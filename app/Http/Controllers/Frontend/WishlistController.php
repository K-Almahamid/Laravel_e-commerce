<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id',Auth::id())->get();
        return view('frontend.wishlist',compact('wishlist'));
    }

    public function add(Request $request)
    {
        if(Auth::check())
        {
            $product_id = $request->input('product_id');
            if(Product::find($product_id))//check if product exists
            {
                $wish = new Wishlist();
                $wish->user_id = Auth::id();
                $wish->product_id = $product_id;
                $wish->save();
                return response()->json(['status' => 'Product Added to Wishlist']);
            }
            else
            {
                return response()->json(['status' => 'Product doesnot exists']);
            }
        }else
        {
            return response()->json(['status' => 'Login to continue']);
        }
    }

    public function deleteItem(Request $request)
    {
        if (Auth::check()) {
            $product_id = $request->input('product_id');
            if (Wishlist::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                $wish = Wishlist::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $wish->delete();
                return response()->json(['status' => 'Item Removed From Wishlist']);
            }
        } else {
            return response()->json(['status' => 'Login to continue']);
        }
    }

    public function wishlistCount()
    {
       $wishlistcount = Wishlist::where('user_id',Auth::id())->count();
       return response()->json(['count'=>$wishlistcount]);
    }
}
