<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index()
{
    $users = User::all(); // Lấy tất cả người dùng, không lọc
    return view('manage', compact('users'));
}

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'Xóa người dùng thành công.');
    }
}
