<?php

namespace App\Http\Controllers;

use App\Models\Invent;
use App\Models\ProductsList;
use Illuminate\Http\Request;

class InventController extends Controller
{
    public function index()
    {
        $invent = Invent::with('productList')->get();
        return view('invent.index', compact('invent'));
    }

    public function create()
    {
        $productsLists = ProductsList::all();
        return view('invent.create', compact('productsLists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codePro' => 'required|string|exists:products_lists,codePro',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        Invent::create($request->all());

        return redirect()->route('invent.index')->with('success', 'Thêm hàng hóa thành công.');
    }

    public function edit(Invent $invent)
    {
        $productsLists = ProductsList::all();
        return view('invent.edit', compact('invent', 'productsLists'));
    }

    public function update(Request $request, Invent $invent)
    {
        $request->validate([
            'codePro' => 'required|string|exists:products_lists,codePro',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        $invent->update($request->all());

        return redirect()->route('invent.index')->with('success', 'Cập nhật hàng hóa thành công.');
    }

    public function destroy(Invent $invent)
    {
        $invent->delete();
        return redirect()->route('invent.index')->with('success', 'Xóa hàng hóa thành công.');
    }
   public function search(Request $request)
{
    $keyword = $request->input('keyword');

    $invent = Invent::where('codePro', 'like', "%$keyword%")
                ->orWhere('description', 'like', "%$keyword%")
                ->orWhereHas('productList', function($query) use ($keyword) {
            $query->where('name', 'like', "%$keyword%");
        })
                ->paginate(10);

    return view('invent.index', compact('invent'));
}
public function report()
{
    $reportData = Invent::select('codePro')
        ->selectRaw('SUM(quantity) as total_quantity')
        ->with('productList') // quan hệ Eloquent
        ->groupBy('codePro')
        ->get();

    return view('report', compact('reportData'));
}

}