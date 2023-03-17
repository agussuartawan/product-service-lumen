<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $product;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        return $this->product->with('category')->get();
    }

    public function store(Request $request)
    {
        $this->validateData($request);

        return $this->product->create($request->all());
    }

    public function update(Request $request, string $id)
    {
        $this->validateData($request);
        $product = $this->product->findOrFail($id);
        $product->update($request->all());

        return $product;
    }

    public function destroy(string $id)
    {
        $product = $this->product->findOrFail($id);
        $product->delete();

        return response()->json('Data deleted successfully', 200);
    }

    public function validateData($request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);
    }

}
 