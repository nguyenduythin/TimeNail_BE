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

    public function add(Request $request)
    {
        $model = new User();

        $model->fill($request->all());
        $model->fill([
            'password' => Hash::make($request->password)
        ]);

        $model->save();
        return redirect(route('user.list'));
    }

    public function remove($id)
    {
        $user = User::find($id);
        //Storage::delete($user->avatar);
        $user->destroy($id);
        return redirect()->back();
    }
}
