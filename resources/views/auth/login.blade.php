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
                        <input class="login-input" style="" type="email" name="email" placeholder="Enter Email">
                    </div>
                    <div>
                        <input class="login-input" type="password" name="password" placeholder="Enter Password">
                    </div>
                    <button type="submit">Login</button>
                </form>
            </div>


    </div>
</div>


@endsection
