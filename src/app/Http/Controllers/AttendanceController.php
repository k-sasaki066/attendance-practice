<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
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
            $attendance->fill([
                'user_id'=>$user_id,
                'date'=>$now_date,
                'start'=>$now_time,
            ]);
            $status = 1;
            // dd($attendance);
        }

        //勤務終了
        if($request->has('end_work')) {
            $attendance = Attendance::where('user_id',$user_id)
            ->where('date', $now_date)
            ->first();

            $attendance->fill([
                'end'=>$now_time,
            ]);
            $status = 3;
            // dd($attendance);
        }

        //休憩開始
        if($request->has('start_rest')) {
            $attendance = new Rest();
            $attendance->fill([
                'start'=>$now_time,
                'attendance_id'=>$attendance_id,
            ]);
            $status = 2;
            // dd($attendance);
        }

        //休憩終了
        if($request->has('end_rest')) {
            $attendance = Rest::where('attendance_id', $attendance_id)
            ->whereNotNull('start')
            ->whereNull('end')
            ->first();
            $attendance->fill(['end' => $now_time]);
            // dd($attendance);
            $status = 1;
        }

        $user = User::find($user_id);
        $user->fill(['status' => $status])->save();
        // dd($user);
        $attendance->save();

        return redirect('/')->with('status',$status);
    }

    //User一覧画面
    public function indexUser() {
        $list_date = Carbon::now()->format('Y-m-d');
        $users = User::paginate(5);
        // dd($list_date);
        return view('attendance_user', compact('users', 'list_date'));
    }

    //勤怠表表示
    public function indexWork() {
        //テーブル結合して休憩時間と勤務時間それぞれの差分を計算
        $list_date = Carbon::now()->format('Y-m-d');
        $users = User::join('attendances', 'users.id', '=', 'attendances.user_id')
            ->leftJoin('rests', 'attendances.id', '=', 'rests.attendance_id')
            ->select(
                'name',
                'date',
                'attendances.start as start_work',
                'attendances.end as end_work',
            )
            ->selectRaw(
                'SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(rests.end,rests.start)))) as rest_time'
            )
            ->selectRaw(
                'TIMEDIFF(attendances.end, attendances.start) as work_time'
            )
            ->groupBy(
                'name',
                'date',
                'start_work',
                'end_work',
            )
            ->whereDate('date', $list_date)
            ->paginate(5);
        // dd($users);
        return view('attendance_date',compact('users', 'list_date'));
    }

    // 日付検索
    public function indexDate(Request $request) {
        // dd($request);
        $date = Carbon::parse($request->list_date);

        if($request->has('prevDate')) {
            $list_date = $date->copy()->subDay()->format('Y-m-d');
        }

        if($request->has('nextDate')) {
            $list_date = $date->copy()->addDay()->format('Y-m-d');
        }

        $users = User::join('attendances', 'users.id', '=', 'attendances.user_id')
            ->leftJoin('rests', 'attendances.id', '=', 'rests.attendance_id')
            ->select(
                'name',
                'date',
                'attendances.start as start_work',
                'attendances.end as end_work',
            )
            ->selectRaw(
                'SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(rests.end,rests.start)))) as rest_time'
            )
            ->selectRaw(
                'TIMEDIFF(attendances.end, attendances.start) as work_time'
            )
            ->groupBy(
                'name',
                'date',
                'start_work',
                'end_work',
            )
            ->whereDate('date', $list_date)
            // dd($users);
            ->Paginate(5);
        // dd($users);

        return view('attendance_date', compact('users', 'list_date'));

    }
}