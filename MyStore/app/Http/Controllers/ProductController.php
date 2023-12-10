<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Stub\ReturnCallback;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::latest()->paginate(5);
        return view('admin.product.index' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.product.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => ['required' , 'integer' , 'exists:categories,id'],
            'name'        => ['required' , 'string' , 'unique:categories,name'],
            'price'       => ['required' , 'string' ],
            'quantity'    => ['required' , 'integer' ],
            'description' => ['required' , 'string' ],
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show' , compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories=Category::all();
        return view('admin.product.edit' , compact('product' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required',
            'name'        => 'required',
            'price'       => 'required',
            'description' => 'required',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }


    public function show_deleted()
    {
        $products=Product::onlyTrashed()->get();
        return view('admin.product.show_deleted' , compact('products'));
    }


    public function force_deleted(string $id)
    {
        Product::withTrashed()->where('id' , $id )->forceDelete();
        return redirect()->route('product_show_deleted')
                        ->with('success','Product deleted permanently');
    }


    public function restore(string $id)
    {
        Product::withTrashed()->where('id' , $id )->restore();
        return redirect()->route('product_show_deleted')
                        ->with('success','Product restored successfully');
    }
}
