<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function geometryCalculator()
    {
        return view('calculator.geometry-calculator');
    }

    public function probabilityCalculator()
    {
        return view('calculator.probability-calculator');
    }
    public function percentageCalculator()
    {
        return view('calculator.percentage-calculator');
    }
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

    public function volumeCalculator()
    {
        return view('calculator.volume-calculator');
    }

    public function gpaCalculator()
    {
        return view('calculator.gpa-calculator');
    }

}
