@extends('layouts.app')
<style>


    .container {
        max-width: 1200px;
    }

    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
        margin-bottom: 20px;

    }

    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-body {
        padding: 10px;

    }

    .alert {
        margin-bottom: 20px;
    }

    h5 {
        margin-bottom: 20px;
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
            margin-top: 20px;
        }
    }


</style>

@section('content')
    <div class="container mt-5">
        <div class="thumbnail-container" id="thumbnailContainer"></div>
        <div class="row justify-content-center">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif

            <div class="card mb-4" style="margin-top: 90px;">
                <div class="card-body">
                    <h5 style="text-transform: uppercase;">Welcome, {{ auth()->user()->name }}! Use MathMagic ToolBox</h5>
                </div>
            </div>

                <div class="card-body">
                    <div class="card mb-4 animated-card-arithmetic">
                        <div class="card-body">
                            <h5>Arithmetic Operations</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <ul>
                                        {{-- <li><a href="{{ route('addition.index') }}" data-preview="{{ asset('assets/images/addition1.png') }}" onmouseover="showThumbnail(this)" onmouseout="hideThumbnail()">Addition</a></li> --}}
                                        <li><a href="{{ route('addition.index') }}">Add Integer</a></li>
                                        <li><a href="{{ route('subtraction.index') }}">Subtract Integer</a></li>
                                        <li><a href="{{ route('multiplication.index') }}">Multiply Integer</a></li>
                                        <li><a href="{{ route('division.index') }}">Divide Integer</a></li>
                                        {{-- <li><a href="{{ route('lcm.index') }}">LCM</a></li>
                                        <li><a href="{{ route('hcf.index') }}">HCF</a></li>
                                        <li><a href="{{ route('bodmas.index') }}">BODMAS</a></li> --}}
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
                                        <li><a href="{{ route('subtract-mixed-fractions.index') }}">Subtract Mixed Fractions</a></li>
                                        <li><a href="{{ route('multiply-mixed-fractions.index') }}">Multiply Mixed Fractions</a></li>
                                        <li><a href="{{ route('divide-mixed-fractions.index') }}">Divide Mixed Fractions</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Calculators Card -->
                    <div class="card mb-4 animated-card-calculator">
                        <div class="card-body">
                            <h5>Calculators</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <ul>
                                        <li><a href="{{ route('standard-calculator.index') }}">Arithmetic Calculator</a></li>
                                        <li><a href="{{ route('percentage-calculator.index') }}">Percentage Calculator</a></li>
                                        <li><a href="{{ route('probability-calculator.index') }}">Probability Calculator</a></li>
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

                    <!-- Converters Card -->
                    <div class="card animated-card-converter">
                        <div class="card-body">
                            <h5>Converters</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <ul>
                                        <li><a href="{{ route('storage-converter.index') }}">Data Storage Converter</a></li>
                                        <li><a href="{{ route('temperature-converter.index') }}">Temperature Converter</a></li>
                                        <li><a href="{{ route('pressure-converter.index') }}">Pressure Converter</a></li>
                                        <li><a href="{{ route('energy-converter.index') }}">Energy Converter</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul>
                                        <li><a href="{{ route('metric-imperial-converter.index') }}">Metric to Imperial</a></li>
                                        <li><a href="{{ route('time-zone-converter.index') }}">Time Zone Converter</a></li>
                                        <li><a href="{{ route('gpa-percentage-converter.index') }}">GPA Percentage Converter</a></li>
                                        <li><a href="{{ route('interest-rate-converter.index') }}">Interest Rate Converter</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul>
                                        <li><a href="{{ route('binary-converter.index') }}">Binary Converter</a></li>
                                        <li><a href="{{ route('decimal-converter.index') }}">Decimal Converter</a></li>
                                        <li><a href="{{ route('octal-converter.index') }}">Octal Converter</a></li>
                                        <li><a href="{{ route('hexadecimal-converter.index') }}">Hexadecimal Converter</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

{{--
    <script>
        function showThumbnail(element) {
            // Get the preview path from data-preview attribute
            var previewPath = element.getAttribute('data-preview');

            // Get the position of the hovered link
            var linkRect = element.getBoundingClientRect();

            // Get the thumbnail container and update its content
            var thumbnailContainer = document.getElementById('thumbnailContainer');
            thumbnailContainer.innerHTML = `<img src="${previewPath}" alt="Preview Thumbnail">`;

            // Set the position of the thumbnail container
            thumbnailContainer.style.display = 'block';
            thumbnailContainer.style.top = `${linkRect.top}px`; // Adjust the positioning as needed
            thumbnailContainer.style.left = `${linkRect.right}px`;
        }

        function hideThumbnail() {
            // Hide the thumbnail container
            var thumbnailContainer = document.getElementById('thumbnailContainer');
            thumbnailContainer.style.display = 'none';
        }
    </script> --}}
@endsection
