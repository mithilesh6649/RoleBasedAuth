<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSchedule;
use App\Models\UserDailySchedule;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }

    public function index2()
    {
        // $shift = UserSchedule::first();
        // $this->createShiftDays($shift);


        $today = Carbon::today()->toDateString();

        // dd($today);


        $schedule = UserDailySchedule::whereHas('shift', function ($query) {
            $query->where('user_id', 1);
        })
            ->whereDate('date', '2024-05-28')
            ->get();

        // dd($schedule);

        return view('home2');
    }


    private function createShiftDays($shift)
    {

        $fromDate = Carbon::parse($shift->from_date);
        $toDate = Carbon::parse($shift->to_date);
        $allData = [];
        while ($fromDate->lte($toDate)) {
            $shiftDay = new UserDailySchedule;
            $shiftDay->user_schedule_id = $shift->id;
            $shiftDay->date = $fromDate->toDateString();
            $shiftDay->from_time = $fromDate->toTimeString();
            $shiftDay->to_time = $toDate->toTimeString();
            $shiftDay->break_duration = '1';
            $shiftDay->shift_status = '1';
            $shiftDay->save();
            $fromDate->addDay();
            $allData[] = $shiftDay;
        }
        // dd($allData);
    }
}
