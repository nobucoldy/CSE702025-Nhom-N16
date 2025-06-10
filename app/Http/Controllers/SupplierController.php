<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codeSup' => 'required|string|max:50|unique:suppliers,codeSup',
            'supplier' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        Supplier::create($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Thêm nhà cung cấp thành công.');
    }

    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'codeSup' => "required|string|max:50|unique:suppliers,codeSup,{$supplier->codeSup},codeSup",
            'supplier' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        $supplier->update($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Cập nhật nhà cung cấp thành công.');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success', 'Xóa nhà cung cấp thành công.');
    }
    public function search(Request $request)
{
    $keyword = $request->input('keyword');
    
    $suppliers = Supplier::where('codeSup', 'like', "%$keyword%")
                ->orWhere('supplier', 'like', "%$keyword%")
                ->orWhere('address', 'like', "%$keyword%")
                ->paginate(10);
    
    return view('suppliers.index', compact('suppliers'));
}
}
