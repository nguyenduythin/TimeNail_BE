<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.page.setting.setting-list');
    }
    
    public function remove($id)
    {
        $setting = Setting::find($id);
        //Storage::delete($feedback->image);
        $setting->destroy($id);
        return redirect()->back();
    }
}
