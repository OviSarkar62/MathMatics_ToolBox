<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function ageCalculator()
    {
        return view('calculator.age-calculator');
    }

    public function bmiCalculator()
    {
        return view('calculator.bmi-calculator');
    }

    public function areaCalculator()
    {
        return view('calculator.area-calculator');
    }

}
