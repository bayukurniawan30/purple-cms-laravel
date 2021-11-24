<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HeadlessController extends Controller
{
    public function show()
    {
        return view('headless.show');
    }
}