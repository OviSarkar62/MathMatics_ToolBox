@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif

            <div class="card mb-4">
                <div class="card-body">
                    <h5>Hello, {{ auth()->user()->name }}, Use MathMagic ToolBox</h5>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5>Calculate Maths</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <ul>
                                        <li><a href="{{ route('addition.index') }}">Addition</a></li>
                                        <li><a href="{{ route('subtraction.index') }}">Subtraction</a></li>
                                        <li><a href="{{ route('multiplication.index') }}">Multiplication</a></li>
                                        <li><a href="{{ route('division.index') }}">Division</a></li>
                                        <li><a href="{{ route('lcm.index') }}">LCM</a></li>
                                        <li><a href="{{ route('hcf.index') }}">HCF</a></li>
                                        <li><a href="{{ route('bodmas.index') }}">BODMAS</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul>
                                        <li><a href="{{ route('add-fractions.index') }}">Add Fractions</a></li>
                                        <li><a href="{{ route('subtract-fractions.index') }}">Subtract Fractions</a></li>
                                        <li><a href="{{ route('multiply-fractions.index') }}">Multiply Fractions</a></li>
                                        <li><a href="{{ route('division-fractions.index') }}">Division Fractions</a></li>
                                        <li><a href="{{ route('add-mixed-fractions.index') }}">Add Mixed Fractions</a></li>
                                        <li><a href="{{ route('subtract-mixed-fractions.index') }}">Subtract Mixed
                                                Fractions</a></li>
                                        <li><a href="{{ route('multiply-mixed-fractions.index') }}">Multiply Mixed
                                                Fractions</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul>
                                        <li><a href="{{ route('average-of-mixed-numbers.index') }}">Average Of Mixed
                                                Numbers</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Calculators Card -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5>Calculators</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <ul>
                                        <li><a href="{{ route('standard-calculator.index') }}">Standard Calculator</a></li>
                                        <li><a href="{{ route('scientific-calculator.index') }}">Scientific Calculator</a>
                                        </li>
                                        <li><a href="{{ route('financial-calculator.index') }}">Financial Calculator</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul>
                                        <li><a href="{{ route('geometry-calculator.index') }}">Geometry Calculator</a></li>
                                        <li><a href="{{ route('matrix-calculator.index') }}">Matrix Calculator</a></li>
                                        <li><a href="{{ route('probability-calculator.index') }}">Probability
                                                Calculator</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul>
                                        <li><a href="{{ route('age-calculator.index') }}">Age Calculator</a></li>
                                        <li><a href="{{ route('unit-converter.index') }}">BMI Calculator</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Converters Card -->
                    <div class="card">
                        <div class="card-body">
                            <h5>Converters</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <ul>
                                        <li><a href="{{ route('currency-converter.index') }}">Currency Converter</a></li>
                                        <li><a href="{{ route('unit-converter.index') }}">Unit Converter</a></li>
                                        <li><a href="{{ route('temperature-converter.index') }}">Temperature Converter</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul>
                                        <li><a href="{{ route('time-converter.index') }}">Time Converter</a></li>
                                        <li><a href="{{ route('date-converter.index') }}">Date Converter</a></li>
                                        <li><a href="{{ route('metric-to-imperial.index') }}">Metric to Imperial</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul>
                                        <li><a href="{{ route('imperial-to-metric.index') }}">Imperial to Metric</a></li>
                                        <li><a href="{{ route('weight-converter.index') }}">Weight Converter</a></li>
                                        <li><a href="{{ route('length-converter.index') }}">Length Converter</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
