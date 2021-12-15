<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillMember;
use App\Models\Combo;
use App\Models\Service;
use App\Models\User;
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
        $model = Bill::all();
        $model->load('user');
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
        $bill = Bill::find($id);
        $bill->load('user');
        $detail_bill = BillMember::where('bill_id', $id)->orderBy('number_member')->get();
        $nguoi1 = null;
        $nguoi2 = null;
        $nguoi3 = null;
        foreach ($detail_bill as $c) {
            $service = null;
            $combo = null;
            $staff = null;
            if ($c->service_id != 'null') {
                $service = Service::whereIn('id', json_decode($c->service_id))->get();
            }
            if ($c->combo_id != 'null') {
                $combo = Combo::whereIn('id', json_decode($c->combo_id))->get();
            }
            $staff = User::find($c->staff_id);
            if ($c->number_member == 1) {
                $nguoi1['service'] = $service;
                $nguoi1['combo'] = $combo;
                $nguoi1['staff'] = $staff;
            }
            if ($c->number_member == 2) {
                $nguoi2['service'] = $service;
                $nguoi2['combo'] = $combo;
                $nguoi2['staff'] = $staff;
            }
            if ($c->number_member == 3) {
                $nguoi3['service'] = $service;
                $nguoi3['combo'] = $combo;
                $nguoi3['staff'] = $staff;
            }
        }
        $combo = Combo::all();
        $service = Service::all();
        return response()->json([
            'bill' => $bill, 'nguoi1' => $nguoi1,
            'nguoi2' => $nguoi2, 'nguoi3' => $nguoi3, 'combo' => $combo, 'service' => $service
        ]);
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

        BillMember::where('bill_id',$request->id)->delete();
        if ($request->service_id1 || $request->combo_id1) {
            $bill_detail = new BillMember();
            $bill_detail['bill_id'] = $request->id;
            $bill_detail['number_member'] = $request->member_1;
            $bill_detail['service_id'] = json_encode($request->service_id1);
            $bill_detail['combo_id'] = json_encode($request->combo_id1);
            $bill_detail['staff_id'] = $request->staff_1;
            $bill_detail->save();
            if($request->combo_id1){
                $combo1 = Combo::whereIn('id',$request->combo_id1)->get();
            }
            if($request->service_id1){
                $service1 = Service::whereIn('id',$request->service_id1)->get();
            }
        }
        if ($request->service_id2 || $request->combo_id2) {
            $bill_detail = new BillMember();
            $bill_detail['bill_id'] = $request->id;
            $bill_detail['number_member'] = $request->member_2;
            $bill_detail['service_id'] = json_encode($request->service_id2);
            $bill_detail['combo_id'] = json_encode($request->combo_id2);
            $bill_detail['staff_id'] = $request->staff_2;
            $bill_detail->save();
            if($request->combo_id2){
                $combo2 = Combo::whereIn('id',$request->combo_id2)->get();
            }
            if($request->service_id2){
                $service2 = Service::whereIn('id',$request->service_id2)->get();
            }
        }
        if ($request->service_id3 || $request->combo_id3) {
            $bill_detail = new BillMember();
            $bill_detail['bill_id'] = $request->id;
            $bill_detail['number_member'] = $request->member_3;
            $bill_detail['service_id'] = json_encode($request->service_id3);
            $bill_detail['combo_id'] = json_encode($request->combo_id3);
            $bill_detail['staff_id'] = $request->staff_3;
            $bill_detail->save();
            if($request->combo_id3){
                $combo3 = Combo::whereIn('id',$request->combo_id3)->get();
            }
            if($request->service_id3){
                $service3 = Service::whereIn('id',$request->service_id3)->get();
            }
        }

        $totalBill = 0;

        if(isset($service1)){
            foreach($service1 as $c){
                $totalBill += $c->price;
            }
        }
        if(isset($service2)){
            foreach($service2 as $c){
                $totalBill += $c->price;
            }
        }
        if(isset($service3)){
            foreach($service3 as $c){
                $totalBill += $c->price;
            }
        }
        if(isset($combo1)){
            foreach($combo1 as $c){
                $totalBill += $c->total_price;
            }
        }
        if(isset($combo2)){
            foreach($combo2 as $c){
                $totalBill += $c->total_price;
            }
        }
        if(isset($combo3)){
            foreach($combo3 as $c){
                $totalBill += $c->total_price;
            }
        }
        
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
