<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\GalleryCategory;
use App\Models\Gallery;

class GalleryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleryCategory = GalleryCategory::all();
        return response()->json($galleryCategory);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $galleryCategory = new GalleryCategory();
        $galleryCategory->fill($request->all());
        if ($request->hasFile('avatar')) {
            $galleryCategory->avatar = $request->file('avatar')->storeAs('/images/gallery-category', uniqid() . '-' . $request->avatar->getClientOriginalName());
        }
        $query = $galleryCategory->save();
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
        return GalleryCategory::find($id);
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
        $galleryCategory = GalleryCategory::find($request->id);
        if ($request->hasFile('avatar')) {
            $galleryCategory->avatar = $request->file('avatar')->storeAs('/images/gallery-category', uniqid() . '-' . $request->avatar->getClientOriginalName());
        }
        $galleryCategory->fill($request->all());
        $query =  $galleryCategory->save();
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
        $galleryCategory = GalleryCategory::find($id);
        Storage::delete($galleryCategory->avatar);
        $gallery = Gallery::where('cate_gl_id', $id)->get();
        foreach ($gallery as $item) {
            Storage::delete($item->url);
        }
        $galleryCategory->delete();
        return  response()->json(['success' => 'Xóa thành công!']);
    }
}
