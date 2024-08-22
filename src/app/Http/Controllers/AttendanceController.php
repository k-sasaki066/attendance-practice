<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Rest;

class AttendanceController extends Controller
{
    //ホーム画面
    public function index() {
        $user_id = Auth::user()->id;
        $now_date = Carbon::now()->format('Y-m-d');
        $confirm_date = Attendance::where('user_id',$user_id)
        ->where('date',$now_date)
        ->first();

        if(!$confirm_date) {
            $status = 0;
        }else {
            $status = Auth::user()->status;
        }
        
        return view('index')->with('status', $status);
    }

    //打刻機能
    public function create(Request $request) {
        $user_id = Auth::user()->id;
        $now_date = Carbon::now()->format('Y-m-d');
        $now_time = Carbon::now();
        if($request->has('start_rest') || $request->has('end_rest')) {
            $attendance_id = Attendance::where('user_id', $user_id)
            ->where('date', $now_date)
            ->first()
            ->id;
        }

        //勤務開始
        if($request->has('start_work')) {
            $attendance = new Attendance();
            $attendance->user_id = $user_id;
            $attendance->date = $now_date;
            $attendance->start = $now_time;
            $status = 1;
            // dd($attendance);
        }

        //勤務終了
        if($request->has('end_work')) {
            $attendance = Attendance::where('user_id',$user_id)
            ->where('date', $now_date)
            ->first();
            $attendance->end = $now_time;
            $status = 3;
            // dd($attendance);
        }

        //休憩開始
        if($request->has('start_rest')) {
            $attendance = new Rest();
            $attendance->start = $now_time;
            $attendance->attendance_id = $attendance_id;
            $status = 2;
            // dd($attendance);
        }

        //休憩終了
        if($request->has('end_rest')) {
            $attendance = Rest::where('attendance_id', $attendance_id)
            ->whereNotNull('start')
            ->whereNull('end')
            ->first();
            // dd($attendance);
            $attendance->end = $now_time;
            $status = 1;
        }

        $user = User::find($user_id);
        $user->status = $status;
        // dd($user);
        $user->save();
        $attendance->save();

        return redirect('/')->with('status',$status);
    }
}
