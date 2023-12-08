@extends('layouts.app')
<style>

    body {
    /* Left bottom corner SVG */
    background-image: url('/assets/img/metric1.svg');
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
                    <h5>Metric to Imperial Converter</h5>
                    <form id="unit-converter-form">
                        <div class="mb-3">
                            <label for="conversionType" class="form-label">Conversion Type:</label>
                            <select id="conversionType" class="form-select">
                                <option value="metricToImperial">Metric to Imperial</option>
                                <option value="imperialToMetric">Imperial to Metric</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="lengthValue" class="form-label">Length Value:</label>
                            <input type="number" step="0.01" id="lengthValue" class="form-control" placeholder="Enter length value" required>
                        </div>
                        <div class="mb-3">
                            <label for="unitFrom" class="form-label">From Unit:</label>
                            <select id="unitFrom" class="form-select">
                                <option value="mm">Millimeters (mm)</option>
                                <option value="cm">Centimeters (cm)</option>
                                <option value="dm">Decimeters (dm)</option>
                                <option value="m">Meters (m)</option>
                                <option value="km">Kilometers (km)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="unitTo" class="form-label">To Unit:</label>
                            <select id="unitTo" class="form-select">
                                <option value="in">Inches (in)</option>
                                <option value="ft">Feet (ft)</option>
                                <option value="yd">Yards (yd)</option>
                                <option value="mi">Miles (mi)</option>
                            </select>
                        </div>
                        <button type="button" onclick="resetForm()" class="btn btn-danger">Reset</button>
                        <button type="button" onclick="convertUnits()" class="btn btn-success">Convert</button>
                        <div class="mb-3" style="display:none;" id="convertedValueSection">
                            <br>
                            <label for="convertedValue" class="form-label">Converted Value:</label>
                            <span id="convertedValueDisplay"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function convertUnits() {
    // Get user input
    const conversionType = document.getElementById('conversionType').value;
    const lengthValue = parseFloat(document.getElementById('lengthValue').value);
    const unitFrom = document.getElementById('unitFrom').value;
    const unitTo = document.getElementById('unitTo').value;

    // Define conversion factors to meters
    const unitToMeters = {
        'mm': 0.001,
        'cm': 0.01,
        'dm': 0.1,
        'm': 1,
        'km': 1000,
        'in': 0.0254,
        'ft': 0.3048,
        'yd': 0.9144,
        'mi': 1609.34
    };

    // Convert both units to meters
    const lengthValueInMeters = lengthValue * unitToMeters[unitFrom];
    const convertedValue = lengthValueInMeters / unitToMeters[unitTo];

    // Display the result
    const convertedValueSection = document.getElementById('convertedValueSection');
    if (!isNaN(convertedValue)) {
        document.getElementById('convertedValueDisplay').textContent = convertedValue.toFixed(2);
        convertedValueSection.style.display = 'block';
    } else {
        document.getElementById('convertedValueDisplay').textContent = 'Invalid conversion';
        convertedValueSection.style.display = 'none';
    }
}

function resetForm() {
    // Reset form values
    document.getElementById('unit-converter-form').reset();
    // Clear the converted value display and hide the section
    document.getElementById('convertedValueDisplay').textContent = '';
    document.getElementById('convertedValueSection').style.display = 'none';

    // Ensure options are swapped back to the original order
    const unitFrom = document.getElementById('unitFrom');
    const unitTo = document.getElementById('unitTo');
    const tempOptions = unitFrom.innerHTML;
    unitFrom.innerHTML = unitTo.innerHTML;
    unitTo.innerHTML = tempOptions;
}

// Swap options when conversion type changes
document.getElementById('conversionType').addEventListener('change', function () {
    const unitFrom = document.getElementById('unitFrom');
    const unitTo = document.getElementById('unitTo');

    // Swap options
    const tempOptions = unitFrom.innerHTML;
    unitFrom.innerHTML = unitTo.innerHTML;
    unitTo.innerHTML = tempOptions;
});

</script>

@endsection
