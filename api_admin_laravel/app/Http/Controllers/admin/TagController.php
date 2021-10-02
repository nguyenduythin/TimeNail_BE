<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.page.tag.tag-list');
    }
}
