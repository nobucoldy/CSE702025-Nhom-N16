<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Export;
use App\Models\Invent;
use App\Models\Product;
use App\Models\ProductsList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InventController extends Controller
{
    public function index()
    {
        $invent = Invent::with('productList')->get();
        return view('invent.import', compact('invent'));
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
            'import_date' => 'required|date',
        ]);

        Invent::create([
    'codePro'     => $request->codePro,
    'quantity'    => $request->quantity,
    'description' => $request->description,
    'import_date' => $request->import_date,
]);


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

    $invent = Invent::where(function ($query) use ($keyword) {
        $query->where('codePro', 'like', "%$keyword%")
              ->orWhere('description', 'like', "%$keyword%")
              ->orWhereHas('productList', function ($subQuery) use ($keyword) {
                  $subQuery->where('name', 'like', "%$keyword%");
              });

        // Nếu từ khóa có định dạng ngày YYYY-MM-DD, tìm theo ngày
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $keyword)) {
            $query->orWhereDate('import_date', $keyword);
        }
    })
    ->with('productList')
    ->paginate(10);

    return view('invent.import', compact('invent'));
}

public function report()
{
    $reportData = Invent::select('codePro')
        ->selectRaw('SUM(quantity) as total_quantity')
        ->with('productList') // quan hệ Eloquent
        ->groupBy('codePro')
        ->get();

    // Kiểm tra nếu người dùng là admin, mới lấy danh sách user
    $users = auth()->check() && auth()->user()->is_admin ? User::all() : collect();

    return view('invent/inventory', compact('reportData', 'users'));
}
public function export(Request $request)
{
    if ($request->isMethod('get')) {
        $products = Invent::all(); // hoặc where('quantity', '>', 0) nếu chỉ lấy hàng còn tồn
        return view('invent.export', compact('products'));
    }

    // Validate và xử lý xuất kho
    $request->validate([
        'codePro' => 'required|exists:invent,codePro',
        'quantity' => 'required|integer|min:1',
        'export_date' => 'required|date',
    ]);

    $product = Invent::where('codePro', $request->codePro)->first();

    if ($product->quantity < $request->quantity) {
        return back()->with('error', 'Số lượng tồn kho không đủ để xuất.');
    }

    $product->quantity -= $request->quantity;
    $product->save();

    Export::create([
        'codePro' => $request->codePro,
        'quantity' => $request->quantity,
        'export_date' => $request->export_date,
        'receiver' => $request->receiver ?? null,
        'note' => $request->note ?? null,
    ]);

    return redirect()->route('invent.export')->with('success', 'Xuất kho thành công.');
}

public function exportReport(Request $request)
{
    $filter = $request->input('filter', 'all');

    $query = Export::with('productList');

    if ($filter === '7days') {
        $query->where('export_date', '>=', Carbon::now()->subDays(7));
    } elseif ($filter === '1month') {
        $query->where('export_date', '>=', Carbon::now()->subMonth());
    } elseif ($filter === '3months') {
        $query->where('export_date', '>=', Carbon::now()->subMonths(3));
    } elseif ($filter === '1year') {
        $query->where('export_date', '>=', Carbon::now()->subYear());
    }

    $reportData = $query->orderBy('export_date', 'desc')->get();

    return view('invent.export_report', compact('reportData', 'filter'));
}




}