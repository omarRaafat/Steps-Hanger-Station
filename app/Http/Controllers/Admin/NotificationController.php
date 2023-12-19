<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subscripe;
use App\Contact;
use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $notifications = Notification::all();
        return view('admin.notifications.index' , ['notifications' => $notifications]);
    }
}
