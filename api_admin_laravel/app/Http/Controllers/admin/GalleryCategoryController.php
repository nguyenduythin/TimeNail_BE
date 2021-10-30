<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryCategoryController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.page.gallery_category.gallery-category-list');
    }
}
