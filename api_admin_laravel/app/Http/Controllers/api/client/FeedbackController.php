<?php

namespace App\Http\Controllers\api\client;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Feedback::all();
        $model->load('user');
        foreach($model as $c){
            $c['avatar'] = asset('storage/'.$c->user->avatar);
        }
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
        $request->validate(['number_star'=>'numeric|min:1|max:5']);
        $model = new Feedback();
        $model['user_id'] = $request->id;
        $model->fill($request->all());
        $query = $model->save();
        $bill_check_feedback = Bill::find($request->bill_id);
        $bill_check_feedback->check_fb = now();
        $bill_check_feedback->save();
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
        $feedback = Feedback::where('user_id',$id)->get();
        $feedback->load('user');
        foreach($feedback as $c){
            $c['avatar'] = asset('storage/'.$c->user->avatar);
        }
        return response()->json($feedback);
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
