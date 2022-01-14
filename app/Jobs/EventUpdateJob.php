<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use Illuminate\Support\Carbon;

class EventUpdateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->refresh();
    }


    public function refresh(){
        $date=Carbon::now();
        $date=substr($date, 0,10);
        //echo $date;
        $date=explode("-",$date);
        $todayDate=$date[0].$date[1].$date[2];
        //echo $newDate;
        intval($todayDate);
        settype($todayDate, "integer");
        //echo $newDate;
        //echo gettype($newDate);
        $eventCompare = \App\Models\Event::all();
        foreach($eventCompare as $event){

            $date=$event->date;
            $date=explode("-",$date);
            $eventDate=$date[0].$date[1].$date[2];
            intval($eventDate);
            settype($eventDate, "integer");
            if($eventDate<$todayDate){
                $id=$event->id;
                $event = Event::findOrFail($id);
                $event->delete();
                //falta el ditach con la relacion
            }

        }
        //cargaInfo
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://api.euskadi.eus/culture/events/v1.0/events/upcoming?_elements=100&_page=1');
        $jsonArray = json_decode($res->getBody()->getContents(), true);
        $eventArray = $jsonArray["items"];
        //obtain the biggest data
        $events = DB::table('events')
            ->select('publicationDate')
            ->orderBy('publicationDate', 'desc')
            ->take(1)
            ->get();

          
            $event=substr($events, 21,-3);
            $maxPusDate=explode("-",$event);
            $maxPusDate=$maxPusDate[0].$maxPusDate[1].$maxPusDate[2];
            //maxPusDate;
            intval($maxPusDate);
            settype($maxPusDate, "integer");
           
            


        foreach($eventArray as $event){
            $publicationDate=$event["publicationDate"];
            $publicationDate=substr( $publicationDate, 0,10);
            $publicationDate=explode("-",$publicationDate);
            $publicationDate=$publicationDate[0].$publicationDate[1].$publicationDate[2];
            settype($publicationDate, "integer");

                if ($maxPusDate<$publicationDate) {
                    
                
                $check=TRUE;
                $eve= new Event();

                $eve->name= $event["nameEu"];
                $eve->type= $event["typeEu"];
                $date= $event["startDate"];
                //2021-11-04T00:00:00Z we receive the date in this format, and we only want to store YYYY-MM-DD
                $date=substr( $date, 0,10);
                $publicationDate=$event["publicationDate"];
                $publicationDate=substr( $publicationDate, 0,10);
                $eve->publicationDate=$publicationDate; 

                $eve->date= $date;
                if (empty($event["purchaseUrlEu"])){
                    $check = false;
                }else{
                    $eve->url=$event["purchaseUrlEu"];
                }

                
                $img = $event["images"];
               
                if (empty($img[0])){
                    $check = false;
                }
                else {
                    $img2=$img[0];
                    $eve->image= $img2["imageUrl"];
                }


                if (empty($event["language"])){
                    $check = false;
                }
                else {
                    if($event["language"]=="EU"){
                        $eve->language= "Euskera" ;
                    }
                    if($event["language"]=="ES"){
                        $eve->language= "Gaztelania" ;
                    }
                    if($event["language"]=="BL"){
                        $eve->language= "Bilingue" ;
                    }
                    if($event["language"]=="NA"){
                        $eve->language= "Zehaztu gabea" ;
                    }
                    if($event["language"]=="EN"){
                        $eve->language= "Ingelesa" ;
                    }
                    if($event["language"]=="DE"){
                        $eve->language= "Alemana" ;
                    }
                }
                
                if (empty($event["establishmentEu"])){
                    $check = false;
                }else{
                    $eve->place=$event["establishmentEu"];
                }

                if (empty($event["priceEu"])){
                    $check = false;
                }
                else {
                    $eve->price= $event["priceEu"];
                }
                if (empty($event["municipalityLatitude"])){
                    $check = false;
                }else{
                    $eve->lat=$event["municipalityLatitude"];
                }
                if (empty($event["municipalityLongitude"])){
                    $check = false;
                }else{
                    $eve->log=$event["municipalityLongitude"];
                }

                if (empty($event["openingHoursEu"])){
                    $check = false;
                }
                else {
                    $eve->hour= $event["openingHoursEu"];
                }

                if (empty($event["municipalityEu"])){
                    $check = false;
                }
                else {
                    $eve->townName= $event["municipalityEu"];
                }

                if (empty($event["municipalityNoraCode"])){
                    $check = false;
                }
                else {
                    $eve->townId= intval($event["municipalityNoraCode"]);
                }

                if (empty($event["provinceNoraCode"])){
                    $check = false;
                }
                else {
                    $eve->provinceId= intval($event["provinceNoraCode"]);
                }
                $eve->checked= $check;
                $eve->save();
            }              
        }
                        
    }
}
