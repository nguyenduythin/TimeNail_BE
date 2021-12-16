<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function read($id)
    {
        $notifi = DB::table('notifications')->find($id);
        if (Auth::user()->roles[0]->name == 'Admin') {
            auth()->user()
                ->unreadNotifications
                ->find($id)
                ->markAsRead();
            return redirect()->route(json_decode($notifi->data)->route);
        } else {
            auth()->user()
                ->unreadNotifications
                ->find($id)
                ->markAsRead();
            return response()->noContent();
        }
    }
    public function readAll()
    {
        $user = User::find(Auth::user()->id);
        $user->unreadNotifications->markAsRead();
        return response()->noContent();
    }
    public function readClient($user_id,$id){
        $user = User::find($user_id);
        $user->unreadNotifications->find($id)->markAsRead();
        return response()->noContent();
    }
    public function readAllClient($id){
        $user = User::find($id);
        $user->unreadNotifications->markAsRead();
        return response()->noContent();
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
        $user = User::find($id);
        return response()->json($user->unreadNotifications);
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
