<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\HolidayRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HolidayRequestController extends Controller
{
    public function index()
    {

        $holidays = HolidayRequest::where('user_id', Auth::user()->id)->get();
        return view('holiday.index',[
            'holidays' => $holidays
        ]);
    }
    public function create()
    {
        return view('holiday.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'holiday_request_type' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason_for_holiday' => 'required|string|max:1000',
        ]);

        HolidayRequest::create([
            'user_id' => Auth::id(),
            'holiday_request_type' => $request->holiday_request_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason_for_holiday' => $request->reason_for_holiday,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Holiday request submitted. Wait for approval');
    }

    public function admin()
    {
        $holidays = HolidayRequest::with('user')
        ->where('status', 'pending')
        ->get()
        ->map(function ($holiday) {
            $holiday->number_of_days = Carbon::parse($holiday->start_date)->diffInDays(Carbon::parse($holiday->end_date));
            return $holiday;
        });

        return view('admin',[
            'holidays' => $holidays
        ]);
    }
    public function history()
    {
        $holidays = HolidayRequest::with('user')
        ->whereIn('status', ['approved', 'rejected'])
        ->get()
        ->map(function ($holiday) {
            $holiday->number_of_days = Carbon::parse($holiday->start_date)->diffInDays(Carbon::parse($holiday->end_date));
            return $holiday;
        });

        return view('leavehistory',[
            'holidays' => $holidays
        ]);
    }
    public function accept($id)
    {
        $holidayRequest = HolidayRequest::findOrFail($id);
        $holidayRequest->status = 'approved';
        $holidayRequest->save();

        return redirect()->back()->with('status', 'Holiday request approved successfully.');
    }

    public function reject($id)
    {
        $holidayRequest = HolidayRequest::findOrFail($id);
        $holidayRequest->status = 'rejected';
        $holidayRequest->save();

        return redirect()->back()->with('status', 'Holiday request rejected successfully.');
    }


}
