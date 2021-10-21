<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get = Role::all();
        $get->load('permissions');

        return response()->json($get);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $get = Role::create(['name' => $request->name]);

        if ($request->has("permissions")) {
            $get->givePermissionTo($request->permissions);
        }
        if (!$get) {
            return response()->json(['code' => 0, 'msg' => 'Thêm mới không thành công !']);
        } else {
            return response()->json(['code' => 1, 'msg' => 'Thêm mới thành công !'], 200);
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
        return Role::find($id)->load('permissions');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idS
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $get = Role::find($request->id);
        $get->name = $request->name;
        $get->save();
        if ($request->has("permissions")) {
            $get->syncPermissions($request->permissions);
        }
        if (!$get) {
            return response()->json(['code' => 0, 'msg' => 'Sửa không thành công !']);
        } else {
            return response()->json(['code' => 1, 'msg' => 'Sửa mới thành công !' , ]);
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
        $get = Role::find($id);
        $get->delete();
        return  response()->json(['success' => 'Xóa thành công!']);
    }
}
