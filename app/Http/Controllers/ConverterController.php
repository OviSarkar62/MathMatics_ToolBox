<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConverterController extends Controller
{
    public function unitConverter()
    {
        return view('converter.unit-converter');
    }
    public function temperatureConverter()
    {
        return view('converter.temperature-converter');
    }
    public function pressureConverter()
    {
        return view('converter.pressure-converter');
    }

    public function energyConverter()
    {
        return view('converter.energy-converter');
    }

    public function metricToImperialConverter()
    {
        return view('converter.metric-imperial-converter');
    }
    public function timeZoneConverter()
    {
        return view('converter.time-zone-converter');
    }
    public function gpaToPercentageConverter()
    {
        return view('converter.gpa-percentage-converter');
    }
    public function interestRateConverter()
    {
        return view('converter.interest-rate-converter');
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
