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
use App\Notifications\BillAdminNotification;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = User::find(195);
        // if ($user->getRoleNames()->first() == 'Member') {
        //     // $staff = DB::table('bill_staff')->where('staff_id', $user->id)->get();
        //     // $staff2 = [];
        //     // foreach ($staff as $c) {
        //     //     array_push($staff2, $c->bill_id);
        //     // }
        //     $all_bill = Bill::where('user_id',$user->id)->orderBy('created_at','desc')->get();
        //     return response()->json($all_bill);
        // }
        $ok = User::role('Admin')->get();
        $user = User::find(182);
        // Notification::send($ok,new BillAdminNotification($user));
        return response()->json($ok);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faker = Faker::create('it_IT'); //import thư viện faker để sinh mã hóa đơn

        $model = new Bill();
        $model['code_bill'] = $faker->taxId();
        $model['date_work'] = $request->date_work;
        $model['status_bill'] = 1;
        $model['user_id'] = $request->user_id;
        $model['total_people'] = $request->total_people;
        $model['phone'] = $request->phone;
        if ($request->note_bill) {
            $model['note_bill'] = $request->note_bill;
        }
        if ($request->code_discount) {
            $model['code_discount'] = $request->code_discount;
        }
        $model['total_time_execution'] = $request->total_time_execution;
        $model['total_bill'] = $request->total_bill;
        $query = $model->save();
        if ($request->combo_id) {
            for ($i = 0; $i < count($request->combo_id); $i++) {
                $many = new BillCombo();
                $many['bill_id'] = $model['id'];
                $many['combo_id'] = $request->combo_id[$i];
                $many->save();
            }
        }
        if ($request->service_id) {
            for ($i = 0; $i < count($request->service_id); $i++) {
                $many = new BillService();
                $many['bill_id'] = $model['id'];
                $many['service_id'] = $request->service_id[$i];
                $many->save();
            }
        }
        for ($i = 0; $i < count($request->staff_id); $i++) {
            $many = new BillStaff();
            $many['bill_id'] = $model['id'];
            $many['staff_id'] = $request->staff_id[$i];
            $many->save();
        }
        $bill = Bill::find($model['id']);
        $bill->load('staff', 'service', 'combo');
        $user = User::find($request->user_id);

        $notifi_to_admin = User::role('Admin')->get();
        Notification::send($notifi_to_admin,new BillAdminNotification($user,$bill['date_work']));
        
        Mail::to($user['email'])->queue(new BillMail(
            $bill,
            $bill['staff'],
            $bill['combo'],
            $bill['service'],
            $bill['date_work'],
            $user['full_name'],
            $bill['total_people'],
        ));
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
