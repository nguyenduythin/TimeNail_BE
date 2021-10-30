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
        $user = User::where('email', $request->email)->first();
        if (!$user && empty($request->email) || empty($request->password) || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Tài khoản mật khẩu không chính xác!']);
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // login admin not token because building with ajax in laravel
            $token = auth()->user()->createToken('timeNail')->plainTextToken;
            return response()->json(['success' => 'Đăng nhập thành công!', 'user' => auth()->user(), 'token' => $token]);
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
}
