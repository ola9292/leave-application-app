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
                <form action="{{ route('holiday.store') }}" method="POST">
                    @csrf
                    <div>
                        <h2 style="text-align: center">Leave Application Form</h2>
                    </div>

                    <div>
                        <label for="holiday_request_type">Select Leave Type</label>
                        <select class="login-input" name="holiday_request_type">
                            <option value="sick" {{ old('holiday_request_type') == 'sick' ? 'selected' : '' }}>Sick</option>
                            <option value="casual" {{ old('holiday_request_type') == 'casual' ? 'selected' : '' }}>Casual</option>
                            <option value="vacation" {{ old('holiday_request_type') == 'vacation' ? 'selected' : '' }}>Vacation</option>
                            <option value="maternity" {{ old('holiday_request_type') == 'maternity' ? 'selected' : '' }}>Maternity</option>
                            <option value="others" {{ old('holiday_request_type') == 'others' ? 'selected' : '' }}>Others</option>
                        </select>
                        @error('holiday_request_type')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="start_date">Start</label>
                        <input class="login-input" type="date" name="start_date" value="{{ old('start_date') }}">
                        @error('start_date')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="end_date">End</label>
                        <input class="login-input" type="date" name="end_date" value="{{ old('end_date') }}">
                        @error('end_date')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="reason_for_holiday">Reasons</label>
                        <textarea class="login-input" name="reason_for_holiday">{{ old('reason_for_holiday') }}</textarea>
                        @error('reason_for_holiday')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit">Submit Leave Request</button>
                </form>
            </div>

        </div>

@endsection

