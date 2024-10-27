<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use inertia\inertia;

class AlertController extends Controller
{
    public function returnAlert()
    {
        return inertia::render('Alert',[
            'message' => "We've received your message. One of our engineers will contact you shortly to discuss your solar solution",
        ]);
    }
}
