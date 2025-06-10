<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductsList;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    public function index()
    {
        $productsLists = ProductsList::with('supplier')->get();
        return view('products.index', compact('productsLists'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        return view('products.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codePro' => 'required|string|max:50|unique:products_lists,codePro',
            'name' => 'required|string|max:255',
            'codeSup' => 'required|string|exists:suppliers,codeSup',
        ]);

        ProductsList::create($request->all());

        return redirect()->route('products.index')->with('success', 'Thêm danh mục sản phẩm thành công.');
    }

    public function edit(ProductsList $productList)
    {
        $suppliers = Supplier::all();
        return view('products.edit', compact('productList', 'suppliers'));
    }

    public function update(Request $request, ProductsList $productList)
    {
        $request->validate([
            'codePro' => "required|string|max:50|unique:products_lists,codePro,{$productList->codePro},codePro",
            'name' => 'required|string|max:255',
            'codeSup' => 'required|string|exists:suppliers,codeSup',
        ]);

        $productList->update($request->all());

        return redirect()->route('products.index')->with('success', 'Cập nhật danh mục sản phẩm thành công.');
    }

    public function destroy(ProductsList $productList)
    {
        $productList->delete();
        return redirect()->route('products.index')->with('success', 'Xóa danh mục sản phẩm thành công.');
    }
    public function search(Request $request)
{
    $keyword = $request->input('keyword');

    $productsLists = ProductsList::with('supplier')
        ->where(function ($query) use ($keyword) {
            $query->where('codePro', 'like', "%$keyword%")
                ->orWhere('name', 'like', "%$keyword%")
                ->orWhereHas('supplier', function ($q) use ($keyword) {
                    $q->where('supplier', 'like', "%$keyword%");
                });
        })
        ->get();

    return view('products.index', compact('productsLists'));
}


}
