<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    //
    public function index(){
        return view('admin.page.discount.discount-list');
    }
}
