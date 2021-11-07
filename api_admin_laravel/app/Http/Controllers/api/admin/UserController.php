<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $users->load('roles');
        $roles = Role::all();
        $staff = User::role('Staff')->count();
        $member = User::role('Member')->count();
        $admin = User::role('Admin')->count();
        $editor = User::role('Editor')->count();
        return response()->json([
            'user' => $users, "role" => $roles,
            "staff" => $staff, "member" => $member,
            "admin" => $admin, "editor" => $editor
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->syncRoles("Member");
        $user->fill([
            'password' => Hash::make($request->password)
        ]);
        if ($request->hasFile('avatar')) {
            $user->avatar = $request->file('avatar')->storeAs('/images/avatar_users', uniqid() . '-' . $request->avatar->getClientOriginalName());
        }
        $query =  $user->save();
        if (!$query) {
            return response()->json(['code' => 0, 'msg' => 'Thêm mới không thành công !']);
        } else {
            return response()->json(['code' => 1, 'msg' => 'Thêm mới thành công !']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);
        $users->load('roles');
        return $users;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find($request->id);
        if ($request->has("role")) {
            $user->syncRoles($request->role);
        }
        $user->fill($request->all());
        // if (!Hash::check($request->password)) {
        // $user->fill([
        //     'password' => Hash::make($request->password)
        // ]);
        // }
        if ($request->hasFile('avatar')) {
            $user->avatar = $request->file('avatar')->storeAs('/images/avatar_users', uniqid() . '-' . $request->avatar->getClientOriginalName());
        }
        $query =  $user->save();
        if (!$query) {
            return response()->json(['code' => 0, 'msg' => 'Sửa không thành công !']);
        } else {
            return response()->json(['code' => 1, 'msg' => 'Sửa mới thành công !']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);
        Storage::delete($user->avatar);
        $user->delete();
        return  response()->json(['success' => 'Xóa thành công!']);
    }
}
