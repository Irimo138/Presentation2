<?php

namespace App\Http\Controllers;

//use Symfony\Component\HttpFoundation\Request;

//use App\Http\Requests\StoreEventPost;
use App\Jobs\EventDownloadJob;
use App\Jobs\EventUpdateJob;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Redirect;

//use Illuminate\Support\Facades\DB;
class AppController extends Controller
{

    //https://api.euskadi.eus/culture/events/v1.0/events/upcoming
   
   
    public function getData(){
        EventDownloadJob::dispatch();
        //return view("main");     
    }
    public function refresh(){
        EventUpdateJob::dispatch();
        return Redirect::back(); 
    }


   
            
    

                }
           
    
     
    
               
    
                   
             
 


