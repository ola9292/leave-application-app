@extends('layouts.app')

@section('content')
        <div class="container-lg">
            <div class="register-now">
                @if (session('success'))
                    <div class="success-alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('holiday.store')}}" method="POST">
                    @csrf
                    <div>
                        <h2 style="text-align: center">Leave Application Form</h2>
                    </div>
                    <div>
                        <label for="">Select Leave Type</label>
                        <select class="login-input" name="holiday_request_type">
                            <option value="sick">Sick</option>
                            <option value="casual">Casual</option>
                            <option value="vacation">Vacation</option>
                            <option value="maternity">Maternity</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                    <div>
                        <label for="">Start</label>
                        <input class="login-input" type="date" name="start_date" placeholder="">
                    </div>
                    <div>
                        <label for="">End</label>
                        <input class="login-input" type="date" name="end_date" placeholder="">
                    </div>
                    <div>
                        <label for="">Reasons</label>
                        <textarea class="login-input" name="reason_for_holiday"></textarea>
                    </div>
                    <button type="submit">Submit Leave Request</button>
                </form>
            </div>

        </div>

@endsection

