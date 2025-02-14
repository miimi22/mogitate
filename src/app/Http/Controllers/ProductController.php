<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ProductIdRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6);
        return view('products', ['products' => $products]);
    }

    public function productId(ProductIdRequest $request, $id)
    {
        $products = Product::find($id);

        if (!$product) {
            abort(404);
        }

        $seasons = Season::all();

        if ($request->has('save'))

            $product->name = $request->input('name');
            $product->price = $request->input('price');
            $product->season_id = $request->input('season_id');
            $rpoduct->description = $request->input('description');

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images', $imageName);
                $product->image = $imageName;
            }

            $product->save();

            return redirect('/productId' . $id);
    }

    public function store(RegisterRequest $request)
    {
        if ($request->isMethod('post')) {
            if ($request->has('back')) {
            return redirect('/register')->withInput();
            }

            $productData = $request->all();

            if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $products['image'] = $imagePath;
            }

            $product = Product::create($productData);

            if ($request->has('season_id')) {
            $product->seasons()->attach($request->input('season_id'), ['create_at' => now(), 'update_at' => now()]);
            }

            return view('register');
        } else {
            return view('register');
        }   
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        if ($keyword) {
            $products = Product::where('name', 'like', "%$keyword%")->paginate(6);
        } else {
            $products =Product::paginate(6);
        }

        return view('products', ['products' => $products, 'keyword' => $keyword]);
    }

    public function show($id)
    {
        $products = Product::find($id);
        $seasons = Season::all();

        return view('productId', compact('products', 'seasons'));
    }
}
