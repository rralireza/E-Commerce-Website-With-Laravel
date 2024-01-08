<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard' , [
            'products' => Product::all()
        ]);
    }

    public function logout(User $user)
    {
        auth()->logout();

        Session::flash('logout' , 'You logout successfully!');
        return redirect(route('registerOtp'));
    }
}
