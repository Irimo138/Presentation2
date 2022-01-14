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

class EventDownloadJob implements ShouldQueue
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
        $this->getData();
        
    }


    public function getData(){
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://api.euskadi.eus/culture/events/v1.0/events/upcoming?_elements=100&_page=1');
        $jsonArray = json_decode($res->getBody()->getContents(), true);
        //dd($jsonArray);
        $eventArray = $jsonArray["items"];
        //dd($jsonArray["items"]);
        foreach($eventArray as $event){
                $check=TRUE;
                $eve= new Event();
                $eve->name= $event["nameEu"];
                $eve->type= $event["typeEu"];
                $publicationDate=$event["publicationDate"];
                $publicationDate=substr( $publicationDate, 0,10);
                $eve->publicationDate=$publicationDate; 
                $date= $event["startDate"];
                //2021-11-04T00:00:00Z we receive the date in this format, and we only want to store YYYY-MM-DD
                $date=substr( $date, 0,10);

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

                if (empty($event["priceEu"])){
                    $check = false;
                }
                else {
                    $eve->price= $event["priceEu"];
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
                if (empty($event["establishmentEu"])){
                    $check = false;
                }else{
                    $eve->place=$event["establishmentEu"];
                }

                if (empty($event["municipalityNoraCode"])){
                    $check = false;
                } else {
                    $eve->townId= intval($event["municipalityNoraCode"]);
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
