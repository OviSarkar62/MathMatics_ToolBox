@extends('layouts.app')
<style>
    .container {
        max-width: 1200px;
    }

    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);
        transition: box-shadow 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-body {
        padding: 2px;
    }

    .alert {
        margin-bottom: 10px;
    }

    h6 {
        margin-bottom: 10px;
        padding: 10px;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    ul li {
        margin-bottom: 10px;
    }

    ul li a {
        text-decoration: none;
        color: #000;
        font-weight: bold;
    }

    ul li a:hover {
        text-decoration: underline;
    }

    /* Responsive adjustments */
    @media (max-width: 767px) {
        .card {
            width: 94%;
            margin-left: auto;
            margin-right: auto;
        }
    }
</style>

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif

            <div style="margin-top: 85px;"></div>

            <div class="row justify-content-center">
                <!-- Arithmetic Operations Card -->
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="card mb-4 animated-card-arithmetic">
                            <h6>Arithmetic Operations</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <ul>
                                        <li><a href="{{ route('addition.index') }}">Add Integer</a></li>
                                        <li><a href="{{ route('subtraction.index') }}">Subtract Integer</a></li>
                                        <li><a href="{{ route('multiplication.index') }}">Multiply Integer</a></li>
                                        <li><a href="{{ route('division.index') }}">Divide Integer</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul>
                                        <li><a href="{{ route('add-fractions.index') }}">Add Fractions</a></li>
                                        <li><a href="{{ route('subtract-fractions.index') }}">Subtract Fractions</a></li>
                                        <li><a href="{{ route('multiply-fractions.index') }}">Multiply Fractions</a></li>
                                        <li><a href="{{ route('division-fractions.index') }}">Divide Fractions</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul>
                                        <li><a href="{{ route('add-mixed-fractions.index') }}">Add Mixed Fractions</a></li>
                                        <li><a href="{{ route('subtract-mixed-fractions.index') }}">Subtract Mixed
                                                Fractions</a></li>
                                        <li><a href="{{ route('multiply-mixed-fractions.index') }}">Multiply Mixed
                                                Fractions</a></li>
                                        <li><a href="{{ route('divide-mixed-fractions.index') }}">Divide Mixed
                                                Fractions</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <!-- Calculators Card -->
                    <div class="card-body">
                        <div class="card mb-4 animated-card-calculator">

                            <h6>Calculators</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <ul>
                                        <li><a href="{{ route('standard-calculator.index') }}">Arithmetic Calculator</a>
                                        </li>
                                        <li><a href="{{ route('percentage-calculator.index') }}">Percentage Calculator</a>
                                        </li>
                                        <li><a href="{{ route('probability-calculator.index') }}">Probability
                                                Calculator</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul>
                                        <li><a href="{{ route('geometry-calculator.index') }}">Geometry Calculator</a></li>
                                        <li><a href="{{ route('area-calculator.index') }}">Area Calculator</a></li>
                                        <li><a href="{{ route('volume-calculator.index') }}">Volume Calculator</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul>
                                        <li><a href="{{ route('age-calculator.index') }}">Age Calculator</a></li>
                                        <li><a href="{{ route('bmi-calculator.index') }}">BMI Calculator</a></li>
                                        <li><a href="{{ route('gpa-calculator.index') }}">GPA Calculator</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <!-- Converters Card -->
                    <div class="card-body">
                        <div class="card animated-card-converter">
                            <h6>Converters</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <ul>
                                        <li><a href="{{ route('storage-converter.index') }}">Data Storage Converter</a>
                                        </li>
                                        <li><a href="{{ route('temperature-converter.index') }}">Temperature Converter</a>
                                        </li>
                                        <li><a href="{{ route('pressure-converter.index') }}">Pressure Converter</a></li>
                                        <li><a href="{{ route('energy-converter.index') }}">Energy Converter</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul>
                                        <li><a href="{{ route('metric-imperial-converter.index') }}">Metric to Imperial
                                                Converter</a></li>
                                        <li><a href="{{ route('time-zone-converter.index') }}">Time Converter</a></li>
                                        <li><a href="{{ route('gpa-percentage-converter.index') }}">GPA Percentage
                                                Converter</a>
                                        </li>
                                        <li><a href="{{ route('interest-rate-converter.index') }}">Interest Rate
                                                Converter</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul>
                                        <li><a href="{{ route('binary-converter.index') }}">Binary Converter</a></li>
                                        <li><a href="{{ route('decimal-converter.index') }}">Decimal Converter</a></li>
                                        <li><a href="{{ route('octal-converter.index') }}">Octal Converter</a></li>
                                        <li><a href="{{ route('hexadecimal-converter.index') }}">Hexadecimal Converter</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
