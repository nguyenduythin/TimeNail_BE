<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillCombo;
use App\Models\BillService;
use App\Models\BillStaff;
use App\Models\Combo;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $model = Bill::orderBy('created_at','desc')->get();
        $model->load('user','staff');
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
        //
        $model = Bill::find($id);
        $model['time_work'] = Carbon::create($model['time_work'])->format('H:i');
        $model->load('service','user','staff','combo');
        return response()->json($model);
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
        $model = Bill::find($request->id);
        $model['date_work'] = $request->date_work;
        $model['time_work'] = $request->time_work;
        $model['status_bill'] = $request->status_bill;
        $model['note_bill'] = $request->note_bill;
        $model['phone'] = $request->phone;

        BillCombo::where('bill_id',$request->id)->delete();
        BillService::where('bill_id',$request->id)->delete();
        BillStaff::where('bill_id',$request->id)->delete();
        $totalTime = 0;
        $totalBill = 0;
        for($i=0;$i<count($request->combo_id);$i++){
            $many = new BillCombo();
            $many['bill_id'] = $request->id;
            $many['combo_id'] = $request->combo_id[$i];
            $time = Combo::find($request->combo_id[$i]);
            $totalTime += $time['total_time_work'];
            $totalBill += $time['total_price'];
            $many->save();
        }
        for($i=0;$i<count($request->service_id);$i++){
            $many = new BillService();
            $many['bill_id'] = $request->id;
            $many['service_id'] = $request->service_id[$i];
            $time = Service::find($request->service_id[$i]);
            $totalTime += $time['total_time_work'];
            $totalBill += $time['price'];
            $many->save();
        }
        for($i=0;$i<count($request->staff_id);$i++){
            $many = new BillStaff();
            $many['bill_id'] = $request->id;
            $many['staff_id'] = $request->staff_id[$i];
            $many->save();
        }
        $model['total_time_execution'] = $totalTime;
        $model['total_bill'] = $totalBill;
        $query = $model->save();
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
        //
        Bill::destroy($id);
        return  response()->json(['success' => 'Xóa thành công!']);
    }
    public function staff(){
        $model = User::role('staff')->get();
        return response()->json($model);
    }
}
