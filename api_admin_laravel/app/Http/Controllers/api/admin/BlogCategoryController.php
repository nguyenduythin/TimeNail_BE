<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\Blog;
use App\Models\BlogTag;
use Illuminate\Support\Facades\Storage;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogCategory = BlogCategory::all();
        return response()->json($blogCategory);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blogCategory = new BlogCategory();
        $blogCategory->fill($request->all());
        if ($request->hasFile('image')) {
            $blogCategory->image = $request->file('image')->storeAs('/images/image_blog-category', uniqid() . '-' . $request->image->getClientOriginalName());
        }
        $query = $blogCategory->save();
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
        return BlogCategory::find($id);
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
        $blogCategory = BlogCategory::find($request->id);
        $blogCategory->fill($request->all());
        if ($request->hasFile('image')) {
            $blogCategory->image = $request->file('image')->storeAs('/images/image_blog-category', uniqid() . '-' . $request->image->getClientOriginalName());
        }
        $query =  $blogCategory->save();
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
        Blog::where('cate_blog_id', $id)->delete();
        // BlogTag::where('blog_id', $blog)->delete();
        // Blog::destroy($blog);
        // $blog->delete();
        $blogCategory = BlogCategory::find($id);
        Storage::delete($blogCategory->image);
        $blogCategory->delete();
        return  response()->json(['success' => 'Xóa thành công!']);
    }
}
