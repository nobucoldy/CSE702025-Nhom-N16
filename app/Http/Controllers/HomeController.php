<?php

namespace App\Http\Controllers;

use App\Models\Export;
use Carbon\Carbon;

use App\Models\Invent;
use App\Models\ProductsList;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $uniqueProductCount = Invent::select('codePro')
    ->groupBy('codePro')
    ->havingRaw('SUM(quantity) > 0')
    ->get()
    ->count();
        $todayImports = Invent::whereDate('created_at', Carbon::today())->count();
        $todayExports = Export::whereDate('created_at', Carbon::today())->count();
        $lowStockProducts = Invent::where('quantity', '<', 15)->get();

        return view('welcome', compact(
            'uniqueProductCount',
            'todayImports',
            'todayExports',
            'lowStockProducts'
        ));
    }
}
