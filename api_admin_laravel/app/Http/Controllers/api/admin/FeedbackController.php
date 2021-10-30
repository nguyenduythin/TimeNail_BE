<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $feedback =DB::table('feedback')
                    ->join('users', 'feedback.user_id', '=', 'users.id')
                    // ->join('services', 'feedback.service_id', '=', 'services.id')
                    // ->join('combo', 'feedback.combo_id', '=', 'combo.id')
                    ->select('feedback.id', 'comment', 'number_star', 'full_name' )
                    ->get();
        return response()->json($feedback);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $feedback = new Feedback();
        $feedback->fill($request->all());
        $query = $feedback->save();
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

        $feedback =DB::table('feedback')
                    ->join('users', 'feedback.user_id', '=', 'users.id')
                    ->select('feedback.id', 'comment', 'number_star', 'full_name' )
                    ->where('feedback.id', '=', $id)
                    ->get();
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
        // $feedback = Feedback::find($id); 
        // $feedback->fill($request->all());
        // $feedback->save();
        // return   $feedback;
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedback = Feedback::find($id)->delete();
        return  response()->json(['success' => 'Xóa thành công!']);
    }
}
