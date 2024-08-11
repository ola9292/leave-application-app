@extends('layouts.app')

@section('content')
        <div class="container-lg">
                <h1>My Leave History</h1>
                <table>
                    <tr>
                        <th>#</th>
                        <th>Leave Application</th>
                        <th>From-Date</th>
                        <th>To-Date</th>
                        <th>Status</th>
                    </tr>
                    @foreach ($holidays as $holiday)
                        <tr>
                            <td>{{ $holiday->id }}</td>
                            <td>{{ $holiday->holiday_request_type}}: {{ $holiday->reason_for_holiday }}</td>
                            <td>{{ $holiday->start_date }}</td>
                            <td>{{ $holiday->end_date }}</td>
                            <td>{{ $holiday->status }}</td>
                        </tr>
                    @endforeach
                </table>

        </div>
@endsection
