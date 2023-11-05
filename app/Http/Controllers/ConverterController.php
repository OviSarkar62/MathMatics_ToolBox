<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConverterController extends Controller
{
    public function temperatureConverter()
    {
        return view('converter.temperature-converter');
    }

    public function binaryConverter()
    {
        return view('converter.binary-converter');
    }
    public function decimalConverter()
    {
        return view('converter.decimal-converter');
    }
    public function octalConverter()
    {
        return view('converter.octal-converter');
    }
    public function hexadecimalConverter()
    {
        return view('converter.hexadecimal-converter');
    }
}
