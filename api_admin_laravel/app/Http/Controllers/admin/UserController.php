<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(Request $request)
    {
        return view('admin.page.user.user-list');
    }
    public function staff(Request $request)
    {
        return view('admin.page.user.staff-list');
    }

}
