<?php

namespace App\Kavenegar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kavenegar
{
   public function sendSms($receptor, $message, $template)
   {
       $ch = curl_init();
       curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
       Curl_setopt($ch, CURLOPT_URL, "https://api.kavenegar.com/v1/"
           . config('constants.kavenegar_api_key') . "/verify/lookup.json?receptor=" .
           $receptor . "&token=" . $message . "&template=" . $template);
      $res = Curl_exec($ch);
      Curl_close($ch);
      return $res;

//       $sender = config('constants.kavenegar_sender');
//       $api = new \Kavenegar \KavenegarApi(config('constants.kavenegar_api_key'));
//
//       try {
//           $api->Lookup($receptor,$message);
//       }
//       catch(\Kavenegar\Exceptions\ApiException $e){
//           // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
//           return $e->errorMessage();
//       }
//       catch(\Kavenegar\Exceptions\HttpException $e){
//           // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
//           return $e->errorMessage();
//       }

       return null;

   }
}