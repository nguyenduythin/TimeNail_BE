<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryServiceController extends Controller
{
    //
    public function index(){
        return view('admin.page.categories_service.categories_service-list');
    }
}
