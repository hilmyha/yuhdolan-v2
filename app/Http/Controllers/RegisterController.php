<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRegisterRequest;
use App\Http\Requests\UpdateRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.register.index', [
            'title' => 'Register',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRegisterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:5|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);

        // dd('registrasi berhasil');
        return redirect('/login')->with('success', 'Registrasi berhasil, silahkan Login');
    }

    
}
