<?php

namespace App\Http\Controllers\api\client;

use App\Http\Controllers\Controller;
use App\Mail\BillMail;
use App\Models\Bill;
use App\Models\BillCombo;
use App\Models\BillMember;
use App\Models\BillService;
use App\Models\BillStaff;
use App\Models\Combo;
use App\Models\Discount;
use App\Models\Service;
use App\Models\User;
use App\Notifications\BillAdminNotification;
use App\Notifications\BillClientNotification;
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
        $user = User::find(Auth::user()->id);
        if ($user->getRoleNames()->first() == 'Member') {
            $all_bill = Bill::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
            return response()->json($all_bill);
        } else {
            $get_bill_id = DB::table('bill_staff')->where('staff_id', $user->id)->pluck('bill_id');
            $bill_today = DB::table('bills')->whereIn('id', $get_bill_id)
                ->where('date_work', '=', now()->format('Y-m-d'))->get();
            $bill_future = DB::table('bills')->whereIn('id', $get_bill_id)
                ->where('date_work', '>', now()->format('Y-m-d'))->get();
            return response()->json(['today' => $bill_today, 'future' => $bill_future]);
        }
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
        $model['time_work'] = $request->time_work;
        $model['status_bill'] = 1;
        $model['user_id'] = $request->user_id;
        $model['phone'] = $request->phone;
        if ($request->note_bill) {
            $model['note_bill'] = $request->note_bill;
        }
        if ($request->code_discount) {
            $code_request = Discount::where('code_discount', $request->code_discount)->first();
            if ($code_request->quantity > 0) {
                $code = Discount::find($code_request->id);
                $code['quantity'] = $code['quantity'] - 1;
                $code->save();
                $model['code_discount'] = $request->code_discount;
            } else {
                return response()->json(['error' => 'Đã hết mã giảm giá']);
            }
        }
        $model['total_time_execution'] = $request->total_time_execution;
        $model['total_bill'] = $request->total_bill;
        $query = $model->save();

        if ($request->member_1) {
            $bill_detail = new BillMember();
            $bill_detail['bill_id'] = $model['id'];
            $bill_detail['number_member'] = $request->member_1;
            $bill_detail['service_id'] = json_encode($request->service_id1);
            $bill_detail['combo_id'] = json_encode($request->combo_id1);
            $bill_detail['staff_id'] = $request->staff_1;
            $bill_detail->save();
            for ($i = 0; $i < count($request->combo_id1); $i++) {
                $many = new BillCombo();
                $many['bill_id'] = $model['id'];
                $many['combo_id'] = $request->combo_id1[$i];
                $many->save();
            }
            for ($i = 0; $i < count($request->service_id1); $i++) {
                $many = new BillService();
                $many['bill_id'] = $model['id'];
                $many['service_id'] = $request->service_id1[$i];
                $many->save();
            }
            $many = new BillStaff();
            $many['bill_id'] = $model['id'];
            $many['staff_id'] = $request->staff_1;
            $many->save();
        }
        if ($request->member_2) {
            $bill_detail = new BillMember();
            $bill_detail['bill_id'] = $model['id'];
            $bill_detail['number_member'] = $request->member_2;
            $bill_detail['service_id'] = json_encode($request->service_id2);
            $bill_detail['combo_id'] = json_encode($request->combo_id2);
            $bill_detail['staff_id'] = $request->staff_2;
            $bill_detail->save();
            for ($i = 0; $i < count($request->combo_id2); $i++) {
                $many = new BillCombo();
                $many['bill_id'] = $model['id'];
                $many['combo_id'] = $request->combo_id2[$i];
                $many->save();
            }
            for ($i = 0; $i < count($request->service_id2); $i++) {
                $many = new BillService();
                $many['bill_id'] = $model['id'];
                $many['service_id'] = $request->service_id2[$i];
                $many->save();
            }
            $many = new BillStaff();
            $many['bill_id'] = $model['id'];
            $many['staff_id'] = $request->staff_2;
            $many->save();
        }
        if ($request->member_3) {
            $bill_detail = new BillMember();
            $bill_detail['bill_id'] = $model['id'];
            $bill_detail['number_member'] = $request->member_3;
            $bill_detail['service_id'] = json_encode($request->service_id3);
            $bill_detail['combo_id'] = json_encode($request->combo_id3);
            $bill_detail['staff_id'] = $request->staff_3;
            $bill_detail->save();
            for ($i = 0; $i < count($request->combo_id3); $i++) {
                $many = new BillCombo();
                $many['bill_id'] = $model['id'];
                $many['combo_id'] = $request->combo_id3[$i];
                $many->save();
            }
            for ($i = 0; $i < count($request->service_id3); $i++) {
                $many = new BillService();
                $many['bill_id'] = $model['id'];
                $many['service_id'] = $request->service_id3[$i];
                $many->save();
            }
            $many = new BillStaff();
            $many['bill_id'] = $model['id'];
            $many['staff_id'] = $request->staff_3;
            $many->save();
        }

        $bill = Bill::find($model['id']);
        $bill->load('staff', 'service', 'combo');
        $user = User::find($request->user_id);

        $notifi_to_admin = User::role('Admin')->get();
        Notification::send($notifi_to_admin, new BillAdminNotification($user, $bill['date_work']));
        Notification::send($user, new BillClientNotification($bill));

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
