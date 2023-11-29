@extends('layouts.app')
<style>
    .container {
        max-width: 600px;
        margin: 0 auto;
    }

    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
        margin-top: 100px;
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

    /* Responsive adjustments */
    @media (max-width: 767px) {
        .card {
            margin-top: 20px;
        }
    }

    #result {
        margin-top: 20px;
        font-weight: bold;
    }
</style>
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5>Temperature Converter</h5>
                        <form id="temperature-form">
                            <div class="mb-3">
                                <label for="standard" class="form-label">Choose a temperature standard:</label>
                                <select name="standard" id="standard" class="form-select">
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
                            <div id="temperature-results">
                                <p id="equivalent-celsius">Equivalent in Celsius:</p>
                                <p id="equivalent-fahrenheit">Equivalent in Fahrenheit:</p>
                                <p id="equivalent-kelvin">Equivalent in Kelvin:</p>
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
    <script>
        document.getElementById('reset').addEventListener('click', function() {
            document.getElementById('temperature').value = ''; // Clear the input field
            clearResults();
        });

        document.getElementById('convert').addEventListener('click', function() {
            convertTemperature();
        });

        function convertTemperature() {
            const standard = document.getElementById('standard').value;
            const temperature = parseFloat(document.getElementById('temperature').value);
            const celsiusResult = document.getElementById('equivalent-celsius');
            const fahrenheitResult = document.getElementById('equivalent-fahrenheit');
            const kelvinResult = document.getElementById('equivalent-kelvin');

            if (!isNaN(temperature)) {
                if (standard === 'celsius') {
                    celsiusResult.textContent = 'Equivalent in Celsius: ' + temperature.toFixed(2);
                    fahrenheitResult.textContent = 'Equivalent in Fahrenheit: ' + (temperature * 9/5 + 32).toFixed(2);
                    kelvinResult.textContent = 'Equivalent in Kelvin: ' + (temperature + 273.15).toFixed(2);
                } else if (standard === 'fahrenheit') {
                    celsiusResult.textContent = 'Equivalent in Celsius: ' + ((temperature - 32) * 5/9).toFixed(2);
                    fahrenheitResult.textContent = 'Equivalent in Fahrenheit: ' + temperature.toFixed(2);
                    kelvinResult.textContent = 'Equivalent in Kelvin: ' + ((temperature - 32) * 5/9 + 273.15).toFixed(2);
                } else if (standard === 'kelvin') {
                    celsiusResult.textContent = 'Equivalent in Celsius: ' + (temperature - 273.15).toFixed(2);
                    fahrenheitResult.textContent = 'Equivalent in Fahrenheit: ' + ((temperature - 273.15) * 9/5 + 32).toFixed(2);
                    kelvinResult.textContent = 'Equivalent in Kelvin: ' + temperature.toFixed(2);
                }
            }
        }

        function clearResults() {
            document.getElementById('equivalent-celsius').textContent = 'Equivalent in Celsius:';
            document.getElementById('equivalent-fahrenheit').textContent = 'Equivalent in Fahrenheit:';
            document.getElementById('equivalent-kelvin').textContent = 'Equivalent in Kelvin:';
        }
    </script>

@endsection
