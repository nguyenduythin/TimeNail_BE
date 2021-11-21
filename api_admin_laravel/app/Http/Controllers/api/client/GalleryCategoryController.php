<?php

namespace App\Http\Controllers\api\client;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class GalleryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = GalleryCategory::all();
        foreach($model as $c){
            $c['avatar'] = asset('storage/'.$c['avatar']);
        }
        $model->load('gallery');
        dd($model);die;
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = GalleryCategory::find($id);
        $model->load('gallery');
        $model['avatar'] = asset('storage/'.$model['avatar']);
        foreach($model['gallery'] as $c){
            $c['url'] = asset('storage/'.$c['url']);
        }
        return response()->json($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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