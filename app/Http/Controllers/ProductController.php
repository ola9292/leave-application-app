<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function create(){
        return view('products.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'tag' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('products', 'public');
            $data['image'] = $filePath;
        }

        Product::create($data);

        return redirect('/')->with('success', 'Product created successfully.');
    }
    public function getCart(){
        $user = Auth::user();
        // Get cart items with related products
        $cartItems = $user->cartItems()->with('product')->get();

        // dd($cartItems);
        return view('cart.index',[
            'cartItems' => $cartItems
        ]);
    }
    public function addToCart(Request $request)
    {
        $product_id = $request->input('product_id');
        $user_id = Auth::user()->id;
        $data = [
            'user_id' => $user_id,
            'product_id' => $product_id,
        ];
        Cart::create($data);
        return redirect('/')->with('success', 'Product created successfully.');
    }
}
