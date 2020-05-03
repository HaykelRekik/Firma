<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function user()
    {
    return view('user');
    
    }
    
    public function superviseurs()
    {
    return view('superviseurs');
    
    }
    
    public function chambres()
    {
    return view('chambres');
    
    }
    
    public function capteurs()
    {
    return view('capteurs');
    
    }
    
    public function notifications()
    {
    return view('notifications');
    
    }
    
    }
    
