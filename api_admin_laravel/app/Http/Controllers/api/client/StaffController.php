<?php

namespace App\Http\Controllers\api\client;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        $user['avatar'] = asset('storage/' . $user['avatar']);
        if ($user->getRoleNames()->first() == 'Staff') {
            return response()->json($user);
        } else {
            return response()->json(['error' => 'Không phải là staff']);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        $staff = User::role('Staff')->get();
        foreach($staff as $c){
            $c->avatar = asset('storage/' . $c->avatar);
        }
        $staff->load('roles');
        return response()->json($staff);
    }


    public function un_available_staff(Request $request){
        $bill_id = Bill::where('date_work',$request->date)->where('time_work',$request->time)->pluck('id');
        $staff_id = BillMember::whereIn('bill_id',$bill_id)->pluck('staff_id');
        $unique_staff_id = array_unique($staff_id->all()); 
        return response()->json($unique_staff_id);
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
