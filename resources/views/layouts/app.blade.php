<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>Online Leave Application</title>
</head>
<body>
    @php
        use App\Models\Employee;
        $employees = Employee::count();

    @endphp
    <nav class="nav">
        <h2><a class="link" href="/holiday/create">Online Leave Application</a></h2>
        <ul class="nav-items">
            @if(Auth::check())
                <li>
                    <a class="link" href="{{ route('holiday.index') }}">My Leave History</a>
                </li>
            @endif
            @if(Auth::check() && Auth::user()->is_admin == 1)
                <li>
                    <a class="link" href="{{ route('holiday.employee') }}">View Employees <span class="employee-count">{{$employees}}</span></a>
                </li>
            @endif
            @if(Auth::check() && Auth::user()->is_admin == 1)
            <li>
                <a class="link" href="{{ route('holiday.admin') }}">Requests</a>
            </li>
            @endif
            @if(Auth::check() && Auth::user()->is_admin == 1)
            <li>
                <a class="link" href="{{ route('holiday.history') }}">History</a>
            </li>
            @endif
            @if(Auth::check())
                <li>
                    <a class="btn-alt" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: one;">
                        {{ csrf_field() }}
                    </form>

                </li>
            @else
            <li>
                <a class="btn" href="{{ route('register') }}">Sign Up</a>
            </li>
            @endif
            {{-- <li>
                <a href="">Contact Us</a>
            </li>
            <li>Cart</li>
            <li>
                <a href="">Login</a>
            </li>
            <li>
                <a href="">Logout</a>
            </li>
            <li>
                <a href="">Register</a>
            </li> --}}

        </ul>
    </nav>
    @yield('content')
</body>
</html>
