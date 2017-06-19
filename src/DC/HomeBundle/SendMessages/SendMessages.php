<?php

namespace DC\HomeBundle\SendMessages;

/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 26/01/2017
 * Time: 00:30
 */
class SendMessages
{


    public function sendConfirmation($booking,$drycleaner,$code,$phone){

        $url = 'https://rest.nexmo.com/sms/json?' . http_build_query(
                [
                    'api_key' =>  'e8bf419e',
                    'api_secret' => 'e134e77b2d89fc99',
                    'to' => $phone,
                    'from' => 'BOOKYOURWASH',
                    'text' => "Thank you for your booking ! You've booked a wash at ".$drycleaner['0']->getName()." for ".date_format($booking['0']->getStartDateTime(),"H:i").". Your reference code is : ".$code.". BOOKYOURWASH"
                ]
            );

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);



    }

}