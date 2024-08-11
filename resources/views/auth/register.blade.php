@extends('layouts.app')

@section('content')
        <div class="container-lg">
            <div class="register-now">
                <form action="{{ route('register.store')}}" method="POST">
                    @csrf
                    <div>
                        <label for="">Full Name</label>
                        <input class="login-input" type="text" name="name" placeholder="Full Name">
                    </div>
                    <div>
                        <label for="">Email</label>
                        <input class="login-input" type="email" name="email" placeholder="Email">
                    </div>
                    <div>
                        <label for="">Password</label>
                        <input class="login-input" type="password" name="password" placeholder="Password">
                    </div>
                    <div>
                        <label for="">Phone No</label>
                        <input class="login-input" type="text" name="phone_number" placeholder="Phone No">
                    </div>
                    <div>
                        <label for="">Gender</label>
                        <select class="login-input" name="gender" id="">
                            <option value="female">Female</option>
                            <option value="male">Male</option>
                            <option value="na">Prefer not to say</option>
                        </select>
                    </div>
                    <div>
                        <label for="">Department</label>
                        <select class="login-input" name="department" id="">
                            <option value="engineering">Engineering</option>
                            <option value="hr">HR</option>
                            <option value="marketing">Marketing</option>
                        </select>
                    </div>
                    <button type="submit">Register</button>
                </form>
            </div>

        </div>

@endsection
