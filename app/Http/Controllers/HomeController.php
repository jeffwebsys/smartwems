<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;
use App\User;
use App\Ticket;
use App\Notify;
use App\PurchaseRequest;

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
        $equipment = Equipment::get();
        $user = User::get();
        $admin = User::role(1)->get();
        $ticket = Ticket::get();
        $ticketLatest = Ticket::limit(1)->latest()->get();
        $ticketCompleted = Ticket::where('status', 3)->get();
        $ticketPending = Ticket::where('status', 2)->get();
        $maintenance = Notify::limit(2)->get();
        $purchase = PurchaseRequest::get();
        return view('home', compact('equipment','user','ticket','ticketCompleted','admin','ticketPending',
        'ticketLatest','maintenance','purchase'));
    }
}
