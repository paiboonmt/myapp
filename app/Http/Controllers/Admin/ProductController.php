<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Product';
        $data = Product::all();
        return view('admin.product',compact('title','data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products,name',
        ]);

        Product::create([
            "name" => $request->name,
            "price" => $request->price,
            "detail" => $request->detail,
        ]);

        return to_route('admin.product');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'detail' => 'required',
        ]);
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'detail' => $request->detail
        ];
        Product::where('id',$id)->update($data);
        return to_route('admin.product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Product::findOrFail($id);
        $item->delete();

        // Product::where('id',$id)->delete();
        // return to_route('admin.product');
        return response()->json(['success' => 'Item deleted successfully']);
    }
}
