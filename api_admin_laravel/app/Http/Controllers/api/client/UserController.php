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
        $user['avatar'] = asset('storage/'.$user['avatar']);
        if($user->getRoleNames()->first()=='Member'){
            return response()->json($user);
            
        }else{
            return response()->json(['error' =>'Không phải là member']);
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
        $user = User::find(Auth::user()->id);
        $user->fill();
        if ($request->hasFile('avatar')) {
            $user->avatar = $request->file('avatar')->storeAs('/images/avatar_users', uniqid() . '-' . $request->avatar->getClientOriginalName());
        }
        $query =  $user->save();
        if (!$query) {
            return response()->json(['code' => 0, 'msg' => 'Sửa không thành công !']);
        } else {
            return response()->json(['code' => 1, 'msg' => 'Sửa thành công !']);
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
        //
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
        $user = User::find(Auth::user()->id);
        if(empty($request->password) || !Hash::check($request->password, $user->password)){
            return response()->json(['error' => 'Mật khẩu cũ không chính xác!']);
        }elseif(empty($request->new_password)||empty($request->re_password)){
            return response()->json(['error' => 'Chưa nhập mật khẩu mới!']);
        }
        else{
            if($request->new_password == $request->re_password){
                $user['password'] = Hash::make($request->re_password);
                $user->save();
                return response()->json(['success' => 'Đổi mật khẩu thành công!']);
            }
            else{
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
