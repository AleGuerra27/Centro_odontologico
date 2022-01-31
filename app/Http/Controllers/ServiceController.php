<?php

namespace Modules\Services\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Exchange_rate;
use Exception;
use Carbon\Carbon;

class ServiceController extends Controller
{
    public function service($type, $number)
    {        
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImFybm9sZGtldmluYWt2cEBnbWFpbC5jb20ifQ.4VXR1LLWP6DX1kWpXbePHaFWGx-aqchaYl46eJyW0Vk';

        

        $res=Http::get('https://dniruc.apisperu.com/api/v1/'.$type.'/'.$number.'?token='.$token.'');
        $person = (object) json_decode($res);
        return compact('person');
    }
    public function exchangeRateTest($date)
    {
        $cambio = Http::get('https://api.apis.net.pe/v1/tipo-cambio-sunat?fecha='.$date.'');
        $exchange = (object) json_decode($cambio);
        return compact('exchange');
    }
    

}
