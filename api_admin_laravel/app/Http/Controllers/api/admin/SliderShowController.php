<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\SliderShow;

class SliderShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliderShow = SliderShow::all();
        return response()->json($sliderShow);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sliderShow = new SliderShow();
        $sliderShow->fill($request->all());
        if ($request->hasFile('image')) {
            $sliderShow->image = $request->file('image')->storeAs('/images/image_slider_show', uniqid() . '-' . $request->image->getClientOriginalName());
        }
        $query = $sliderShow->save();
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
        return SliderShow::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request )
    {
        $sliderShow = SliderShow::find($request->id);
        $sliderShow->fill($request->all());
        if ($request->hasFile('image')) {
            $sliderShow->image = $request->file('image')->storeAs('/images/image_slider_show', uniqid() . '-' . $request->image->getClientOriginalName());
        }
        $query =  $sliderShow->save();
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
        $sliderShow = SliderShow::find($id);
        Storage::delete($sliderShow->image);
        $sliderShow->delete();
        return  response()->json(['success' => 'Xóa thành công!']);
    }
}
