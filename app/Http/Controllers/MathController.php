<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MathController extends Controller
{

    public function addition()
    {
        return view('math.addition');
    }

    public function subtraction()
    {
        return view('math.subtraction');
    }

    public function multiplication()
    {
        return view('math.multiplication');
    }

    public function division()
    {
        return view('math.division');
    }

    public function lcm()
    {
        return view('math.lcm');
    }

    public function hcf()
    {
        return view('math.hcf');
    }

    public function bodmas()
    {
        return view('math.bodmas');
    }

    public function addFractions()
    {
        return view('math.add_fractions');
    }

    public function subtractFractions()
    {
        return view('math.subtract_fractions');
    }

    public function multiplyFractions()
    {
        return view('math.multiply_fractions');
    }

    public function divisionFractions()
    {
        return view('math.division_fractions');
    }

    public function addMixedFractions()
    {
        return view('math.add_mixed_fractions');
    }

    public function subtractMixedFractions()
    {
        return view('math.subtract_mixed_fractions');
    }

    public function multiplyMixedFractions()
    {
        return view('math.multiply_mixed_fractions');
    }

    public function divisionMixedFractions()
    {
        return view('math.division_mixed_fractions');
    }

    public function averageOfMixedNumbers()
    {
        return view('math.average_of_mixed_numbers');
    }

}
