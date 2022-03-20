<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SmsService
{

    public static function send($phone, $text)
    {
        // dd($phone);

        $data = ([
            // 'number' => "571236516",
            'numbers' => $phone,
            'text' => $text,
        ]);

        $arrContextOptions = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );

        $final_text = urlencode($text);

        $url = 'https://api.smsreklama.ge/sms/send/?username=testuser&password=ppwwdd1&brand=1&numbers=995'.$phone.'&text='.$final_text;
        
        $response = file_get_contents($url, false, stream_context_create($arrContextOptions));

//        $response = file_get_contents($url, false, stream_context_create($arrContextOptions));

        //dd($url);

//        $response = file_get_contents($url);

//        $response = Http::get($url);

//        dd($response);

        return $response;

    }

}
