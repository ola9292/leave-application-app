@extends('layouts.app')

@section('content')
        <div class="container-lg">
                <h1 class="text-center">Admin Panel - Employee Leave History</h1>
                <table>
                    <tr>
                        <th>#</th>
                        <th>Employee</th>
                        <th>Leave Application</th>
                        <th>Dates</th>
                        <th>Leave</th>
                        <th>Status</th>
                    </tr>
                    @foreach ($holidays as $holiday)
                        <tr>
                            <td>{{ $holiday->id }}</td>
                            <td>{{ $holiday->user->name }}</td>
                            <td>{{ $holiday->holiday_request_type}}: {{ $holiday->reason_for_holiday }}</td>
                            <td>{{ $holiday->start_date }} -- {{ $holiday->end_date }}</td>
                            <td>{{ $holiday->number_of_days }} Day/s</td>
                            <td>{{ $holiday->status }}</td>
                        </tr>
                    @endforeach
                </table>

        </div>
@endsection
