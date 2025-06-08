<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Support\Facades\Auth;

class HotelSettingsController extends Controller
{
    public function index()
    {

        return view('content.account.settings');
    }
}
