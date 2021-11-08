<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i";
        if (!preg_match($regex, $request->email)) {
            return response()->json(['error' => 'email không đúng định dạng!']);
        }
        $user = User::where('email', $request->email)->first();
        if (!$user && empty($request->email) || empty($request->password) || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Tài khoản mật khẩu không chính xác!']);
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]) && $user->hasRole('Admin')) {
            // login admin not token because building with ajax in laravel
            $token = auth()->user()->createToken('timeNail')->plainTextToken;

            return response()->json(['success' => 'Admin đăng nhập thành công!', 'token' => $token]);
        }
        return response()->json(['error' => 'Không có vai trò !']);
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
}
