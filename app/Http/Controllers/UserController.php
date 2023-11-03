<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    // User Dashboard Page
    public function index()
    {

        if (Auth::check()) {

            return view('user.user-dashboard');
        } else {
            return redirect()->route('login'); // Redirect to the login page
        }
    }
}
