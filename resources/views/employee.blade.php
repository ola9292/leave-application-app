@extends('layouts.app')

@section('content')
        <div class="container-lg">
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
                <h1 class="text-center">Admin Panel - Registered Employees</h1>
                <table>
                    <tr>
                        <th>#</th>
                        <th>Employee</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Gender</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->user->name }}</td>
                            <td>{{ $employee->user->email}}</td>
                            <td>{{ $employee->department }}</td>
                            <td>{{ $employee->gender }}</td>
                            <td>{{ $employee->phone_number }}</td>
                            <td>
                                <div class="flex">
                                    <form class="form-pad" action="{{ route('employee.delete', $employee->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-alt">Delete</button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </table>

        </div>
@endsection
