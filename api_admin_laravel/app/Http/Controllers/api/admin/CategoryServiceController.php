<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryService;
use Illuminate\Http\Request;

class CategoryServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $model = CategoryService::all();
        return response()->json($model);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $model = new CategoryService();
        $model->fill($request->all());
        if ($request->hasFile('image')) {
            $model->image = $request->file('image')->storeAs('/images/categories_service', uniqid() . '-' . $request->image->getClientOriginalName());
        }
        $query =  $model->save();
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
        //
        return CategoryService::find($id);
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
        //
        $model = CategoryService::find($request->id);
        $model->fill($request->all());
        if ($request->hasFile('image')) {
            $model->image = $request->file('image')->storeAs('/images/categories_service', uniqid() . '-' . $request->image->getClientOriginalName());
        }
        $query =  $model->save();
        if (!$query) {
            return response()->json(['code' => 0, 'msg' => 'Sửa không thành công !']);
        } else {
            return response()->json(['code' => 1, 'msg' => 'Sửa thành công !']);
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
        CategoryService::destroy($id);
        return  response()->json(['success' => 'Xóa thành công!']);
    }
}
