<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Blog;
use App\Models\Combo;
use App\Models\Contact;
use App\Models\Discount;
use App\Models\Feedback;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($start, $end)
    {
        if (!empty($start) && !empty($end)) {
            $from = date($start);
            $to = date($end);
            $date_work = Bill::whereBetween('date_work', [$from, $to])->selectRaw('date(date_work) as date_work, sum(total_bill) as total_bill')
                ->groupBy(DB::raw('date(date_work)'))
                ->get();
        } else {
            $date_work = Bill::pluck('date_work');
        }
        $userCount = User::count();
        $serviceCount = Service::count();
        $blog = Blog::count();
        $gallery = Gallery::count();
        $feedback = Feedback::count();
        $discount = Discount::count();
        $contact = Contact::count();
        $comboCount = Combo::count();
        $staff = User::role('Staff')->count();
        $bill = Bill::sum('total_bill');
        $avg_bill = Bill::count();
        $doing_bil = Bill::where('status_bill', 3)->count();
        $success_bill = Bill::where('status_bill', 4)->count();
        // $total_bill = Bill::pluck('total_bill');
        return response()->json([
            'user' => $userCount, "service" => $serviceCount,
            "combo" => $comboCount, 'staff' => $staff, 'bill' => $bill, 'avg_bill' => $avg_bill,
            'doing_bill' => $doing_bil, 'success_bill' => $success_bill,
            'date_work' => $date_work, 'contact' => $contact, 'blog' => $blog,
            'discount' => $discount, 'feedback' => $feedback, 'gallery' => $gallery
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getOnlyDateWorkFist()
    {
        $date_work = Bill::pluck('date_work')->first();
        return response()->json($date_work);
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
