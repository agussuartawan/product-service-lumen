<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $category;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        return $this->category->all();
    }

    public function store(Request $request)
    {
        $this->validateData($request);

        return $this->category->create($request->all());
    }

    public function update(Request $request, string $id)
    {
        $this->validateData($request);
        $category = $this->category->findOrFail($id);
        $category->update($request->all());

        return $category;
    }

    public function destroy(string $id)
    {
        $category = $this->category->findOrFail($id);
        $category->delete();

        return response()->json('Data deleted successfully', 200);
    }

    public function validateData($request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);
    }

}
 