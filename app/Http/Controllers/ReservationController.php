<?php

namespace App\Http\Controllers;

use App\Mail\approvalMail;
use App\Mail\sendMailable;
use App\Models\Reservation;
use App\Models\Setting;
use App\Models\Vat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function index(){
        $reservations = Reservation::latest()->get();
        return view('admin.reservations.index' )->with('reservations' ,$reservations);
    }

    public function show($reservation_id){
        $reservation = Reservation::find($reservation_id);
        return view('admin.reservations.show' )->with('reservation' ,$reservation);
    }

    public function approve($reservation_id){
        $reservation = Reservation::find($reservation_id);
        $time = date('H:i A' , strtotime($reservation->time));
//        return response()->json(["message" =>$time]);
        $restaurant_name = Setting::value('restaurant_name_ar');
        $message = " عزيزي العميل تم تأكيد حجزك في $restaurant_name   بتاريخ $reservation->date  الساعة $time  وفي حال التأخر عن الموعد بنصف ساعة يعتبر الحجز ملغي وشكرا ";
        try {
            $phone= (int)($reservation->phone);
            \Unifonic::send($phone, $message,  $senderID = "Steps-sa");
            $reservation->update(['status' => 1]);
            return response()->json(["message" => __('menu.success message sent to client') , 'status' => 1]);
        }catch (\Exception $ex){
            return response()->json(["error" => __('menu.wrong phone entered'),'status' => 0]);
        }

    }


}
