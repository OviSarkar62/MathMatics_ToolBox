@extends('layouts.app')
<style>

    body {
    /* Left bottom corner SVG */
    background-image: url('/assets/img/temp1.svg');
    background-repeat: no-repeat, no-repeat;
    background-position: left bottom, right bottom;
    background-size: auto, auto; /* Adjust this based on your SVG sizes */
    height: 20vh;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
    }

    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);
        transition: box-shadow 0.3s ease;
        margin-top: 55px;
    }

    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-body {
        padding: 20px;
    }

    .form-label {
        font-weight: bold;
    }

    .btn {
        margin-top: 10px;
    }


    #result {
        margin-top: 20px;
        font-weight: bold;
    }
    @media (max-width: 576px) {
        .card {
            margin-top: 20px;
        }
        body {
            background: none; /* Remove background styling for smaller screens */
        }
    }

    @media (max-width: 768px) {
        .card {
            margin-top: 40px;
        }
        body {
            background: none; /* Remove background styling for smaller screens */
        }
    }

    @media (max-width: 992px) {
        .card {
            margin-top: 60px;
        }
        body {
            background: none; /* Remove background styling for smaller screens */
        }
    }

    @media (max-width: 1200px) {
        .card {
            margin-top: 80px;
        }
        body {
            background: none; /* Remove background styling for smaller screens */
        }
    }
</style>


@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5>Temperature Converter</h5>
                        <form id="temperature-form">
                            <div class="mb-3" id="convert-from-container">
                                <label for="convert-from" class="form-label">Convert From:</label>
                                <select name="convert-from" id="convert-from" class="form-select">
                                    <option value="celsius">Celsius</option>
                                    <option value="fahrenheit">Fahrenheit</option>
                                    <option value="kelvin">Kelvin</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="temperature" class="form-label">Enter temperature:</label>
                                <input type="number" name="temperature" id="temperature" class="form-control"
                                    placeholder="Temperature">
                            </div>
                            <div class="mb-3" id="convert-to-container">
                                <label for="convert-to" class="form-label">Convert To:</label>
                                <select name="convert-to" id="convert-to" class="form-select">
                                    <option value="celsius">Celsius</option>
                                    <option value="fahrenheit">Fahrenheit</option>
                                    <option value="kelvin">Kelvin</option>
                                </select>
                            </div>
                            <div id="temperature-results" style="display: none;">
                            </div>
                            <div class="mt-3">
                                <button type="button" id="reset" class="btn btn-danger">Reset</button>
                                <button type="button" id="convert" class="btn btn-success">Convert</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#convert").on("click", function () {
                var convertFrom = $("#convert-from").val();
                var convertTo = $("#convert-to").val();
                var temperature = parseFloat($("#temperature").val());

                // Perform the temperature conversion calculation
                var convertedCelsius, convertedFahrenheit, convertedKelvin;

                switch (convertFrom) {
                    case "celsius":
                        convertedCelsius = temperature;
                        break;
                    case "fahrenheit":
                        convertedCelsius = (temperature - 32) * (5 / 9);
                        break;
                    case "kelvin":
                        convertedCelsius = temperature - 273.15;
                        break;
                }

                switch (convertTo) {
                    case "celsius":
                        $("#temperature-results").text("Equivalent in Celsius: " + convertedCelsius.toFixed(2));
                        break;
                    case "fahrenheit":
                        convertedFahrenheit = (convertedCelsius * 9 / 5) + 32;
                        $("#temperature-results").text("Equivalent in Fahrenheit: " + convertedFahrenheit.toFixed(2));
                        break;
                    case "kelvin":
                        convertedKelvin = convertedCelsius + 273.15;
                        $("#temperature-results").text("Equivalent in Kelvin: " + convertedKelvin.toFixed(2));
                        break;
                }

                $("#temperature-results").show();
            });

            $("#reset").on("click", function () {
                $("#temperature-results").hide().empty(); // Hide and clear the results
                $("#convert-from, #convert-to").val('celsius'); // Reset dropdowns to default
                $("#temperature").val(''); // Clear the input field
            });
        });
    </script>

@endsection


