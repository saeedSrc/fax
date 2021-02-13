<?php

namespace App\Kavenegar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kavenegar
{
   public function sendSms($receptor, $message) {
       $sender = config('constants.kavenegar_sender');
       $api = new \Kavenegar \KavenegarApi(config('constants.kavenegar_api_key'));

       try {
           $api->Send($sender,$receptor,$message);
       }
       catch(\Kavenegar\Exceptions\ApiException $e){
           // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
           return $e->errorMessage();
       }
       catch(\Kavenegar\Exceptions\HttpException $e){
           // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
           return $e->errorMessage();
       }

       return null;

   }
}