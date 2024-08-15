@extends('layouts.app')

@section('content')
<div class="container" style="border: 1px solid black">
    <div class="grid-container-2">
        <div>
            <img src="{{ asset('images/leave-5.jpg') }}" alt="leave">
        </div>

            <div class="login-form">
                <div>
                    <h2>Please login to continue...</h2>
                </div>
                <form action="{{ route('login.store')}}" method="POST">
                    @csrf
                    <div>
                        <input class="login-input" type="email" name="email" placeholder="Enter Email" value="{{ old('email') }}">
                        @error('email')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <input class="login-input" type="password" name="password" placeholder="Enter Password">
                        @error('password')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit">Login</button>
                </form>
            </div>


    </div>
</div>


@endsection
