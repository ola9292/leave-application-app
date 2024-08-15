@extends('layouts.app')

@section('content')
        <div class="container-lg">
            <div class="register-now">
                <form action="{{ route('register.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="name">Full Name</label>
                        <input class="login-input" type="text" name="name" placeholder="Full Name" value="{{ old('name') }}">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="email">Email</label>
                        <input class="login-input" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                        @error('email')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="password">Password</label>
                        <input class="login-input" type="password" name="password" placeholder="Password">
                        @error('password')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="phone_number">Phone No</label>
                        <input class="login-input" type="text" name="phone_number" placeholder="Phone No" value="{{ old('phone_number') }}">
                        @error('phone_number')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="gender">Gender</label>
                        <select class="login-input" name="gender" id="gender">
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="na" {{ old('gender') == 'na' ? 'selected' : '' }}>Prefer not to say</option>
                        </select>
                        @error('gender')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="department">Department</label>
                        <select class="login-input" name="department" id="department">
                            <option value="engineering" {{ old('department') == 'engineering' ? 'selected' : '' }}>Engineering</option>
                            <option value="hr" {{ old('department') == 'hr' ? 'selected' : '' }}>HR</option>
                            <option value="marketing" {{ old('department') == 'marketing' ? 'selected' : '' }}>Marketing</option>
                        </select>
                        @error('department')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit">Register</button>
                </form>
            </div>

        </div>

@endsection
