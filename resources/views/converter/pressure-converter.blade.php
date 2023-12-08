@extends('layouts.app')
<style>
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

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5>Pressure Converter</h5>
                    <form id="pressure-converter-form">
                        <div class="mb-3">
                            <label for="pressure" class="form-label">Enter Pressure:</label>
                            <input type="number" id="pressure" class="form-control" placeholder="Enter pressure value">
                        </div>
                        <div class="mb-3">
                            <label for="fromUnit" class="form-label">From Unit:</label>
                            <select id="fromUnit" class="form-select">
                                <option value="Pa">Pascal (Pa)</option>
                                <option value="bar">Bar</option>
                                <option value="kgcm2">Kilogram per Square Centimeter (kg/cm²)</option>
                                <option value="mmHg">Millimeters of Mercury (mm Hg)</option>
                                <option value="inHg">Inches of Mercury (in Hg)</option>
                                <option value="psi">Pound per Square Inch (psi)</option>
                                <option value="psf">Pound per Square Foot (psf)</option>
                                <option value="mmH2O">Millimeters of Water Column at 4C (mm H2O)</option>
                                <option value="inH2O">Inches of Water Column at 4C (in H2O)</option>
                                <option value="atm">Atmospheric Pressure (atm)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="toUnit" class="form-label">To Unit:</label>
                            <select id="toUnit" class="form-select">
                                <option value="Pa">Pascal (Pa)</option>
                                <option value="bar">Bar</option>
                                <option value="kgcm2">Kilogram per Square Centimeter (kg/cm²)</option>
                                <option value="mmHg">Millimeters of Mercury (mm Hg)</option>
                                <option value="inHg">Inches of Mercury (in Hg)</option>
                                <option value="psi">Pound per Square Inch (psi)</option>
                                <option value="psf">Pound per Square Foot (psf)</option>
                                <option value="mmH2O">Millimeters of Water Column at 4C (mm H2O)</option>
                                <option value="inH2O">Inches of Water Column at 4C (in H2O)</option>
                                <option value="atm">Atmospheric Pressure (atm)</option>
                            </select>
                        </div>
                        <button type="reset" id="reset" onclick="resetForm()" class="btn btn-danger">Reset</button>
                        <button type="button" onclick="convertPressure()" class="btn btn-success">Convert</button>
                        <div id="result"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>


function resetForm() {
    // Reset input fields
    document.getElementById('pressure').value = '';
    document.getElementById('fromUnit').value = 'Pa';
    document.getElementById('toUnit').value = 'Pa';

    // Clear the result output
    document.getElementById('result').innerHTML = '';
}

    function convertPressure() {
        var pressureValue = parseFloat(document.getElementById('pressure').value);
        var fromUnit = document.getElementById('fromUnit').value;
        var toUnit = document.getElementById('toUnit').value;

        if (isNaN(pressureValue)) {
            alert('Please enter a valid pressure value.');
            return;
        }

        var result;
        switch (fromUnit) {
            case 'Pa':
                result = convertFromPascal(pressureValue, toUnit);
                break;
            case 'bar':
                result = convertFromBar(pressureValue, toUnit);
                break;
            case 'kgcm2':
                result = convertFromKgCm2(pressureValue, toUnit);
                break;
            case 'mmHg':
                result = convertFromMmHg(pressureValue, toUnit);
                break;
            case 'inHg':
                result = convertFromInHg(pressureValue, toUnit);
                break;
            case 'psi':
                result = convertFromPsi(pressureValue, toUnit);
                break;
            case 'psf':
                result = convertFromPsf(pressureValue, toUnit);
                break;
            case 'mmH2O':
                result = convertFromMmH2O(pressureValue, toUnit);
                break;
            case 'inH2O':
                result = convertFromInH2O(pressureValue, toUnit);
                break;
            case 'atm':
                result = convertFromAtm(pressureValue, toUnit);
                break;
            default:
                alert('Invalid "From" unit selected.');
                return;
        }

        function convertFromPascal(value, toUnit) {
        switch (toUnit) {
            case 'Pa':
                return value;
            case 'bar':
                return value * 0.00001;
            case 'kgcm2':
                return value * 0.000010197;
            case 'mmHg':
                return value * 0.00750062;
            case 'inHg':
                return value * 0.00029530;
            case 'psi':
                return value * 0.00014503773773375;
            case 'psf':
                return value * 0.020885434273039;
            case 'mmH2O':
                return value * 0.10197162129779;
            case 'inH2O':
                return value * 0.0040147421331121;
            case 'atm':
                return value * 9.8692e-6;
            default:
                return NaN;
        }
    }


    function convertFromBar(value, toUnit) {
        switch (toUnit) {
            case 'Pa':
                return value * 100000;
            case 'bar':
                return value;
            case 'kgcm2':
                return value * 1.01972;
            case 'mmHg':
                return value * 750.062;
            case 'inHg':
                return value * 29.5299875;
            case 'psi':
                return value * 14.5038;
            case 'psf':
                return value * 2048.16;
            case 'mmH2O':
                return value * 1034.21;
            case 'inH2O':
                return value * 40.786;
            case 'atm':
                return value * 0.986923;
            default:
                return NaN;
        }
    }

    function convertFromKgCm2(value, toUnit) {
        switch (toUnit) {
            case 'Pa':
                return value * 98066.5;
            case 'bar':
                return value * 0.980665;
            case 'kgcm2':
                return value;
            case 'mmHg':
                return value * 735.56;
            case 'inHg':
                return value * 28.959;
            case 'psi':
                return value * 14.2233;
            case 'psf':
                return value * 2048.16;
            case 'mmH2O':
                return value * 1034.21;
            case 'inH2O':
                return value * 40.786;
            case 'atm':
                return value * 0.967841;
            default:
                return NaN;
        }
    }

    function convertFromMmHg(value, toUnit) {
        switch (toUnit) {
            case 'Pa':
                return value * 133.322;
            case 'bar':
                return value * 0.00133322;
            case 'kgcm2':
                return value * 0.00135951;
            case 'mmHg':
                return value;
            case 'inHg':
                return value * 0.0393701;
            case 'psi':
                return value * 0.0193368;
            case 'psf':
                return value * 2.7845;
            case 'mmH2O':
                return value * 1.35951;
            case 'inH2O':
                return value * 0.535241;
            case 'atm':
                return value * 0.00131579;
            default:
                return NaN;
        }
    }

    function convertFromInHg(value, toUnit) {
        switch (toUnit) {
            case 'Pa':
                return value * 3386.39;
            case 'bar':
                return value * 0.0338639;
            case 'kgcm2':
                return value * 0.0345316;
            case 'mmHg':
                return value * 25.4;
            case 'inHg':
                return value;
            case 'psi':
                return value * 0.491154;
            case 'psf':
                return value * 70.7262;
            case 'mmH2O':
                return value * 34.5316;
            case 'inH2O':
                return value * 13.5951;
            case 'atm':
                return value * 0.0334211;
            default:
                return NaN;
        }
    }
    function convertFromPsi(value, toUnit) {
        switch (toUnit) {
            case 'Pa':
                return value * 6894.76;
            case 'bar':
                return value * 0.0689476;
            case 'kgcm2':
                return value * 0.070307;
            case 'mmHg':
                return value * 51.715;
            case 'inHg':
                return value * 2.03602;
            case 'psi':
                return value;
            case 'psf':
                return value * 144;
            case 'mmH2O':
                return value * 70.307;
            case 'inH2O':
                return value * 27.678;
            case 'atm':
                return value * 0.068046;
            default:
                return NaN;
        }
    }

    function convertFromPsf(value, toUnit) {
        switch (toUnit) {
            case 'Pa':
                return value * 47.8803;
            case 'bar':
                return value * 0.000478803;
            case 'kgcm2':
                return value * 0.000488242;
            case 'mmHg':
                return value * 0.359131;
            case 'inHg':
                return value * 0.014088;
            case 'psi':
                return value * 0.00694444;
            case 'psf':
                return value;
            case 'mmH2O':
                return value * 0.488242;
            case 'inH2O':
                return value * 0.192256;
            case 'atm':
                return value * 0.000475789;
            default:
                return NaN;
        }
    }

    function convertFromMmH2O(value, toUnit) {
        switch (toUnit) {
            case 'Pa':
                return value * 9.80665;
            case 'bar':
                return value * 0.0000980665;
            case 'kgcm2':
                return value * 0.0001;
            case 'mmHg':
                return value * 0.735559;
            case 'inHg':
                return value * 0.028959;
            case 'psi':
                return value * 0.0142233;
            case 'psf':
                return value * 204.816;
            case 'mmH2O':
                return value;
            case 'inH2O':
                return value * 0.0393701;
            case 'atm':
                return value * 0.00009678;
            default:
                return NaN;
        }
    }

    function convertFromInH2O(value, toUnit) {
        switch (toUnit) {
            case 'Pa':
                return value * 248.84;
            case 'bar':
                return value * 0.00248842;
            case 'kgcm2':
                return value * 0.00254;
            case 'mmHg':
                return value * 1.86832;
            case 'inHg':
                return value * 0.0735559;
            case 'psi':
                return value * 0.0361273;
            case 'psf':
                return value * 51.7149;
            case 'mmH2O':
                return value * 25.4;
            case 'inH2O':
                return value;
            case 'atm':
                return value * 0.00248016;
            default:
                return NaN;
        }
    }

    function convertFromAtm(value, toUnit) {
        switch (toUnit) {
            case 'Pa':
                return value * 101325;
            case 'bar':
                return value * 1.01325;
            case 'kgcm2':
                return value * 1.03323;
            case 'mmHg':
                return value * 760;
            case 'inHg':
                return value * 29.9213;
            case 'psi':
                return value * 14.696;
            case 'psf':
                return value * 2116.22;
            case 'mmH2O':
                return value * 10332.2;
            case 'inH2O':
                return value * 407.214;
            case 'atm':
                return value;
            default:
                return NaN;
        }
    }

    document.getElementById('result').innerHTML = `Conversion Result: ${result.toFixed(2)} ${toUnit}`;
    }

    // Event listener for the Convert button
    document.getElementById('convertBtn').addEventListener('click', convertPressure);

    // Event listener for the Reset button
    document.getElementById('reset').addEventListener('click', resetForm);


</script>

@endsection






