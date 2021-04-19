<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;
use App\User;
use App\Ticket;
use App\TicketHistory;
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
        $userAdmin = User::find(auth()->user()->id);
        $admin = User::role(1)->get();
        $ticket = Ticket::get();
        $ticketLatest = TicketHistory::limit(4)->paginate(2);
        $ticketCompleted = Ticket::where('status', 3)->get();
        $ticketPending = Ticket::where('status', 2)->get();
        $maintenance = Notify::limit(2)->get();
        $purchase = PurchaseRequest::get();
        return view('home', compact('equipment','user','ticket','ticketCompleted','admin','ticketPending',
        'ticketLatest','maintenance','purchase','userAdmin'));
    }
}
