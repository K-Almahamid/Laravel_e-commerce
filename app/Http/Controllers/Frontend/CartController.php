<?php


namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class CartController extends Controller
{


    public function addProduct(Request $request)
    {
        $product_id = $request->Input('product_id');
        $product_quantity = $request->Input('product_quantity');

        if (Auth::check()) {
            $product_check = Product::where('id', $product_id)->first();

            if ($product_check) {
                if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => $product_check->name . ' Already Added to cart']);
                } else {
                    $cartItem = new Cart();
                    $cartItem->product_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->product_quantity = $product_quantity;
                    $cartItem->save();
                    return response()->json(['status' => $product_check->name . ' Added to cart']);
                }
            }
        } else {
            return response()->json(['status' => 'Login to continue']);
        }
    }

    public function viewCart()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.cart', compact('cartItems'));
    }

    public function updateCart(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_quantity');

        if(Auth::check())
        {
            if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) 
            {
                $cart =Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $cart->product_quantity=$product_qty;
                $cart->update();
                return response()->json(['status' => 'Quantity Updated']);
            }
        }
    }

    public function deleteProduct(Request $request)
    {
        if (Auth::check()) {
            $product_id = $request->input('product_id');
            if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                $cartItem = Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => 'Product Deleted Successfully']);
            }
        } else {
            return response()->json(['status' => 'Login to continue']);
        }
    }

    public function cartCount()
    {
       $cartcount = Cart::where('user_id',Auth::id())->count();
       return response()->json(['count'=>$cartcount]);
    }

}
