<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Models\Combo;
use App\Models\ComboService;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $model = Combo::all();
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
        $model = new Combo();
        $model->fill($request->all());
        if ($request->hasFile('image')) {
            $model->image = $request->file('image')->storeAs('/images/combo_avatar', uniqid() . '-' . $request->image->getClientOriginalName());
        }
        $query =  $model->save();
        for($i=0;$i<count($request->service_id);$i++){
            $many = new ComboService();
            $many['combo_id'] = $model->id;
            $many['service_id'] = $request->service_id[$i];
            $many->save();
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
        //
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
        $combo = Combo::find($id);
        Storage::delete($combo->image);
        $combo->delete();
        return  response()->json(['success' => 'Xóa thành công!']);
    }
}
