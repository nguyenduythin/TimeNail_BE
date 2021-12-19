<?php

namespace App\Http\Controllers\api\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user && empty($request->email) || empty($request->password) || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Tài khoản mật khẩu không chính xác!']);
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $token = auth()->user()->createToken('timeNail')->plainTextToken;
            $users =  auth()->user();
            $users->avatar =   asset('storage/' .$users->avatar);
            return response()->json([
                'success' => 'Đăng nhập thành công!',
                'user' => $users, 'roles' => Auth::user()->roles[0]->name, 'token' => $token
            ], 200);
        }
        return response()->json(['error' => 'Ooops! something went wrong!']);
    }
    public function logout(Request $request)
    {
        auth('sanctum')->user()->tokens()->delete();
        if (Auth::logout()) {
            return response()->json(['success' => 'Đăng Xuất Thành Công!']);
        } else {
            return response()->json(['error' => 'Đăng Xuất Không Thành Công!']);
        }
    }
    public function register(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            $user = new User();
            $user->fill($request->all());
            $user->syncRoles("Member");
            $user->fill([
                'password' => Hash::make($request->password),
                'avatar' => 'avatar-none.png'
            ]);
            $query =  $user->save();
            if (!$query) {
                return response()->json(['msg' => 'Đăng ký không thành công !'], 400);
            } else {
                return response()->json(['msg' => 'Đăng ký thành công !'], 200);
            }
        } else {
            return response()->json(['msg' => 'Tài khoản đã tồn tại !'], 400);
        }
    }
}
