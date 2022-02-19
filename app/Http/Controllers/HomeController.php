<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use App\Models\Order;

use Carbon\Carbon;


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
        $date=Carbon::today()->subDays(30);
        return view('layouts.master',[
            'total_admin'=>User::count(),
            'total_customer'=>Customer::count(),
            'lastmonthsales'=>Order::sum('subtotal'),


    ]);
    }
}
