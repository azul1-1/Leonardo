<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    function index(){
        return view('layouts.subscription');
        
    }
}
