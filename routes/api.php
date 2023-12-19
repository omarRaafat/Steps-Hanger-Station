<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/test" , function (){

    $url = "https://eu-test.oppwa.com/v1/payments";
    $data = "entityId=8ac7a4ca7d36f76f017d42247d320e19" .
        "&amount=10" .
        "&currency=SAR" .
        "&paymentType=DB" .
        "&paymentBrand=MADA" .
        "&shopperResultUrl=https://web.com" .
        "&card.cvv=742" .
        "&card.holder=Jane Jones" .
        "&card.number=5297411013651575" .
        "&card.expiryYear=2025" .
        "&card.expiryMonth=04";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization:Bearer OGFjN2E0Y2E3ZDM2Zjc2ZjAxN2Q0MjIzODNiODBlMTF8Um04OWVmNHFiVw=='));
//    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $responseData = curl_exec($ch);
    if(curl_errno($ch)) {
        return curl_error($ch);
    }
    curl_close($ch);
    return $responseData;

});
