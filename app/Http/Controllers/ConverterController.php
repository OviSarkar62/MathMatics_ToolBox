<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConverterController extends Controller
{
    public function temperatureConverter()
    {
        return view('converter.temperature-converter');
    }
}
