<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

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
        if(auth()->user() != null && auth()->user()->role == 1){
            $eventsToCheck = DB::table('events')
            ->where('checked', 0)
            ->simplePaginate(8);
           
            $newUsers = DB::table('users')
            ->orderBy('id', 'asc')
            ->take(10)
            ->get();



            return view('admin',['events' => $eventsToCheck , 'users' => $newUsers]);
        }
        if(auth()->user() != null && auth()->user()->role == 2){
            $id=auth()->user()->id;
            $userEdit = User::findOrFail($id);
            return view ('artist', ['user'=>$userEdit]);
        }
        if(auth()->user() != null && auth()->user()->role == 3){
            
        $events = DB::table('events')
        ->where('checked', 1)
            ->take(20)
            ->get();
            return view('main', ['eventList'=> $events]);
           
        }
        
        
    }
}
