<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class HostedPbxController extends Controller
{
    public function create()
    {
        return view('hosted_pbx_table');
    }
}
