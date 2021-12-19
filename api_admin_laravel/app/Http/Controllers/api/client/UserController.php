<?php

namespace App\Http\Controllers\api\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        $user['avatar'] =  $user['avatar'];
        if ($user->getRoleNames()->first() == 'Member') {
            return response()->json($user);
        } else {
            return response()->json(['error' => 'Không phải là member']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function info(Request $request)
    {
        $user = User::find($request->id);
        $user->fill($request->all());
        if ($request->hasFile('avatar')) {
            $user->avatar = $request->file('avatar')->storeAs('/images/avatar_users', uniqid() . '-' . $request->avatar->getClientOriginalName());
        }
        $query =  $user->save();
        $user['avatar'] = asset('storage/' . $user['avatar']);
        if (!$query) {
            return response()->json(['code' => 0, 'msg' => 'Sửa không thành công !']);
        } else {
            return response()->json([
                'msg' => 'Sửa thành công !',
                'user' => $user, 'roles' => $user->getRoleNames()->first()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postUserGG(Request $request)
    {
        $is_user = User::where('email', $request['email'])->first();
        if (!$is_user) {
            $saveUser = User::updateOrCreate([
                'google_id' => $request->google_id,
            ], [
                'full_name' => $request->full_name,
                'email' => $request->email,
                'avatar' =>  $request->avatar,
                'password' => Hash::make($request->full_name . '@' . $request->google_id)
            ]);
            $saveUser->syncRoles("Member");
            $saveUser = User::where('email', $request['email'])->first();
            return response()->json(['code' => 1, 'msg' => 'Thêm mới thành công !', 'user' => $saveUser]);
        } else {
            $saveUser = User::where('email',  $request['email'])->update([
                'google_id' => $request->google_id,
            ]);
            $saveUser = User::where('email', $request['email'])->first();
            return response()->json([
                'code' => 2, 'msg' => 'Đăng nhập thành Công !',
                'user' => $saveUser
            ]);
        };
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function password(Request $request)
    {
        $user = User::find($request->id);
        if (empty($request->password) || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Mật khẩu cũ không chính xác!']);
        } elseif (empty($request->new_password) || empty($request->re_password)) {
            return response()->json(['error' => 'Chưa nhập mật khẩu mới!']);
        } else {
            if ($request->new_password == $request->re_password) {
                $user['password'] = Hash::make($request->re_password);
                $user->save();
                return response()->json(['success' => 'Đổi mật khẩu thành công!']);
            } else {
                return response()->json(['error' => 'Mật khẩu mới không trùng nhau!']);
            }
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
        //
    }
}
