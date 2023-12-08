@extends('layouts.app')
<style>
    body {
    /* Left bottom corner SVG */
    background-image: url('/assets/img/energy2.svg');
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
            margin-top: 50px;
        }
    }

    #result {
        margin-top: 20px;
        font-weight: bold;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Energy Converter</h5>
                    <form id="energy-converter-form">
                        <div class="mb-3">
                            <label for="energyValue" class="form-label">Energy Value:</label>
                            <input type="number" step="0.01" id="energyValue" class="form-control" placeholder="Enter energy value" required>
                        </div>
                        <div class="mb-3">
                            <label for="fromUnit" class="form-label">From Unit:</label>
                            <select id="fromUnit" class="form-select">
                                <option value="calories">Calories</option>
                                <option value="joules">Joules</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="toUnit" class="form-label">To Unit:</label>
                            <select id="toUnit" class="form-select">
                                <option value="calories">Calories</option>
                                <option value="joules">Joules</option>
                            </select>
                        </div>
                        <button type="button" onclick="resetEnergyForm()" class="btn btn-danger">Reset</button>
                        <button type="button" onclick="convertEnergy()" class="btn btn-success">Convert</button>
                        <div class="mb-3" style="display:none;" id="conversionResultSection">
                            <br>
                            <label for="conversionResult" class="form-label">Conversion Result:</label>
                            <span id="conversionResultDisplay"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
        function resetEnergyForm() {
        document.getElementById('energyValue').value = '';
        document.getElementById('fromUnit').value = 'calories';
        document.getElementById('toUnit').value = 'joules';
        document.getElementById('conversionResultSection').style.display = 'none';
        document.getElementById('conversionResultDisplay').innerText = '';
    }

    function convertEnergy() {
        var energyValue = parseFloat(document.getElementById('energyValue').value);

        if (isNaN(energyValue)) {
            alert('Please enter a valid number for energy value');
            return;
        }

        var fromUnit = document.getElementById('fromUnit').value;
        var toUnit = document.getElementById('toUnit').value;
        var conversionResult;

        if (fromUnit === 'calories' && toUnit === 'joules') {
            conversionResult = energyValue * 4.184; // 1 calorie = 4.184 joules
        } else if (fromUnit === 'joules' && toUnit === 'calories') {
            conversionResult = energyValue / 4.184; // 1 joule = 0.239005736 calories
        } else {
            alert('Invalid conversion');
            return;
        }

        // Display result up to 4 decimal places
        document.getElementById('conversionResultDisplay').innerText = conversionResult.toFixed(4);
        document.getElementById('conversionResultSection').style.display = 'block';
    }

</script>

@endsection
