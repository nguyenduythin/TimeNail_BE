<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Models\BlogTag;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        $blogs->load('categoryBlog');
        $blogs->load('blogUser');
        $blogs->load('blogTag');
        return response()->json($blogs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->fill($request->all());
        if ($request->hasFile('image')) {
            $blog->image = $request->file('image')->storeAs('/images/image_blog', uniqid() . '-' . $request->image->getClientOriginalName());
        }
        $query = $blog->save();
        
        if($request->has('blog_tag')){
            foreach($request->blog_tag as $dataBlogTag){
                $blogTag = new BlogTag();
                $blogTag->blog_id = $blog->id;
                $blogTag->tag_id = $dataBlogTag;
                $blogTag->save();
            }
        }
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
        $blogs = Blog::find($id);
        $blogs->load('categoryBlog');
        $blogs->load('blogUser');
        $blogs->load('blogTag');
        return response()->json($blogs);
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
        $blog = Blog::find($request->id);
        BlogTag::where('blog_id', $request->id)->delete();
        
        // foreach($product->productTag as $pt){
        //     ProductTag::where('tag_id', $pt->id)->where('product_id', $id)->delete();
        // }
        $blog->fill($request->all());
        if ($request->hasFile('image')) {
            $blog->image = $request->file('image')->storeAs('/images/image_blog', uniqid() . '-' . $request->image->getClientOriginalName());
        }
        $query = $blog->save();
        if($request->has('blog_tag')){
            foreach($request->blog_tag as $dataBlogTag){
                $blogTag = new BlogTag();
                $blogTag->blog_id = $blog->id;
                $blogTag->tag_id = $dataBlogTag;
                $blogTag->save();
            }
        }
        if (!$query) {
            return response()->json(['code' => 0, 'msg' => 'Thêm mới không thành công !']);
        } else {
            return response()->json(['code' => 1, 'msg' => 'Thêm mới thành công !']);
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
        $blog = Blog::find($id);
        Storage::delete($blog->image);
        BlogTag::where('blog_id', $id)->delete();
        $blog->delete();
        return  response()->json(['success' => 'Xóa thành công!']);
    }
}
