<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone_number' => 'required',
            'gender' => 'required',
            'department' => 'required'
        ]);

        $userData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'], // Hash the password before storing it
        ];


        $user = User::create($userData);

        $data['user_id'] = $user->id;
        Employee::create($data);

        return redirect('/login');
    }
}
