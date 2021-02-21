<?php

namespace App\Kavenegar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kavenegar
{
   public function sendSms($receptor, $message) {


       $ch = curl_init();

     Curl_setopt ($ch, CURLOPT_URL, "https://api.kavenegar.com/v1/526763684176386B483461444C36733430793979774C5658493577304F6A646B6E345930363373463073633D/verify/lookup.json?receptor=09123860421&token=852596&template=PasswordRecovery");

       Curl_exec($ch);

       Curl_close ($ch);



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