<?php

namespace App\Http\Controllers\api\client;

use App\Http\Controllers\Controller;
use App\Mail\BillMail;
use App\Models\Bill;
use App\Models\BillCombo;
use App\Models\BillService;
use App\Models\BillStaff;
use App\Models\Combo;
use App\Models\Discount;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Mail;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $faker = Faker::create('it_IT');
        // $ok['bill'] = $faker->taxId();
        // return response()->json($ok);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faker = Faker::create('it_IT');//import thư viện faker để sinh mã hóa đơn

        $model = new Bill();
        $model['code_bill'] = $faker->taxId();
        $model['date_work'] = $request->date_work;
        $model['status_bill'] = 1;
        $model['user_id'] = $request->user_id;
        $model['total_people'] = $request->total_people;
        $model['phone'] = $request->phone;
        if($request->note_bill){
            $model['note_bill'] = $request->note_bill;
        }
        if($request->code_discount){
            $model['code_discount'] = $request->code_discount;
            $discount = Discount::where('code_discount',$request->code_discount)->first();
        }
        $model['total_time_execution'] = $request->total_time_execution;
        $model['total_bill'] = $request->total_bill;
        $query = $model->save();
        if($request->combo_id){
            for($i=0;$i<count($request->combo_id);$i++){
                $many = new BillCombo();
                $many['bill_id'] = $model['id'];
                $many['combo_id'] = $request->combo_id[$i];
                $many->save();
            }
        }
        if($request->service_id){
            for($i=0;$i<count($request->service_id);$i++){
                $many = new BillService();
                $many['bill_id'] = $model['id'];
                $many['service_id'] = $request->service_id[$i];
                $many->save();
            }
        }
        for($i=0;$i<count($request->staff_id);$i++){
            $many = new BillStaff();
            $many['bill_id'] = $model['id'];
            $many['staff_id'] = $request->staff_id[$i];
            $many->save();
        }
        $bill = Bill::find($model['id']);
        $bill->load('staff','service','combo');
        $user = User::find($request->user_id);
        Mail::to($user['email'])->send(new BillMail($bill,$bill['staff'],$bill['combo'],$bill['service'],$discount['percent']));
        if (!$query) {
            return response()->json(['code' => 0, 'msg' => 'Đặt lịch không thành công !']);
        } else {
            return response()->json(['code' => 1, 'msg' => 'Đặt lịch thành công !']);
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
    }
}
