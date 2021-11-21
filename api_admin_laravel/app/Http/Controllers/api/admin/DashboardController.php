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

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($start , $end)
    {
        if (!empty($start) && !empty($end)) {
            // $from = date($_GET['start']);
            // $to = date($_GET['end']);
            $from = date($start);
            $to = date($end);
            $date_work =  Bill::whereBetween('date_work', [$from, $to])->pluck('date_work');
        }else{
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
        $avg_bill = Bill::avg('total_bill');
        $doing_bil = Bill::where('status_bill', 3)->count();
        $success_bill = Bill::where('status_bill', 4)->count();
 
        // $date_works = Bill::select(array('date_work', 'total_bill'))->get();

        // $from = date('2021-10-10');
        // $to = date('2021-12-02');
        // $date_works = Bill::whereBetween('date_work', [$from, $to])->select(array('date_work', 'total_bill'))->get();

        $total_bill = Bill::pluck('total_bill');
        return response()->json([
            'user' => $userCount, "service" => $serviceCount,
            "combo" => $comboCount, 'staff' => $staff, 'bill' => $bill, 'avg_bill' => $avg_bill,
            'doing_bill' => $doing_bil, 'success_bill' => $success_bill, 'date_work' => $date_work,
            'total_bill' => $total_bill, 'contact' => $contact, 'blog' => $blog,
            'discount' => $discount, 'feedback' => $feedback, 'gallery' => $gallery
        ]);
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
