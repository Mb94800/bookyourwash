<?php

namespace DC\AdminBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class DCAdminBundle extends Bundle
{

    public function getListDryCleaners(){
        return "ok";
    }

    public function get_lat_long($postalcode,$opt){
        $postalcode = urlencode($postalcode);
        $url ="https://maps.googleapis.com/maps/api/geocode/json?address=".$postalcode.",+UK&sensor=false&key=AIzaSyCuoDQheiwo8yZhH-zJuYSnvZ2LyjQvZKI";


        $json = @file_get_contents($url);

        $result = json_decode($json);



        if($opt == 'lat') {
            return $result->results["0"]->geometry->location->lat;
        }else{
            return $result->results["0"]->geometry->location->lng;
        }
    }
}

