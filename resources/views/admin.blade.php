@extends('layouts.app')

@section('content')
        <div class="container-lg">
                <h1 class="text-center">Admin Panel</h1>
                <table>
                    <tr>
                        <th>#</th>
                        <th>Employee</th>
                        <th>Leave Application</th>
                        <th>Dates</th>
                        <th>Leave</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($holidays as $holiday)
                        <tr>
                            <td>{{ $holiday->id }}</td>
                            <td>{{ $holiday->user->name }}</td>
                            <td>{{ $holiday->holiday_request_type}}: {{ $holiday->reason_for_holiday }}</td>
                            <td>{{ $holiday->start_date }} -- {{ $holiday->end_date }}</td>
                            <td>{{ $holiday->number_of_days }} Day/s</td>
                            <td>
                                <div class="flex">
                                    <form class="form-pad" action="{{ route('holiday-requests.accept', $holiday->id) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn">Accept</button>
                                    </form>
                                    <form class="form-pad" action="{{ route('holiday-requests.reject', $holiday->id) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn-alt">Reject</button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </table>

        </div>
@endsection
