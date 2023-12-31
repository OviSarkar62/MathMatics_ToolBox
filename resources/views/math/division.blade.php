@extends('layouts.app')
<style>
    /* Add this style to your existing CSS file or create a new one */
    body {
        /* Left bottom corner SVG */
        background-image: url('/assets/img/division1.svg');
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

    /* Responsive Design */
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
                    <h5>Division of Integer</h5>
                    <form id="division-form">
                        <div class="mb-3">
                            <label for="dividend" class="form-label">Dividend:</label>
                            <input type="number" name="dividend" id="dividend" class="form-control" placeholder="Enter the dividend">
                        </div>
                        <div class="mb-3">
                            <label for="divisor" class="form-label">Divisor:</label>
                            <input type="number" name="divisor" id="divisor" class="form-control" placeholder="Enter the divisor">
                        </div>
                        <button type="button" id="reset-button" class="btn btn-danger">Reset</button>
                        <button type="submit" class="btn btn-success">Calculate</button>
                    </form>
                    <hr>
                    <div id="result" class="mt-3">
                        <strong>Result:</strong>
                        <div id="output-values"></div>
                        <div id="result-value"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('division-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const dividend = parseInt(document.getElementById('dividend').value);
        const divisor = parseInt(document.getElementById('divisor').value);

        if (divisor === 0) {
            document.getElementById('output-values').innerHTML = 'Division by zero is undefined.';
            document.getElementById('result-value').innerHTML = '';
        } else {
            const quotient = Math.floor(dividend / divisor);
            const remainder = dividend % divisor;
            const resultText = formatDivisionOutput(dividend, divisor, quotient, remainder);
            document.getElementById('output-values').innerHTML = resultText;
        }
    });

    document.getElementById('reset-button').addEventListener('click', function() {
        document.getElementById('dividend').value = ''; // Clear dividend field
        document.getElementById('divisor').value = ''; // Clear divisor field
        document.getElementById('output-values').innerHTML = ''; // Clear output
        document.getElementById('result-value').innerHTML = ''; // Clear result
    });

    function formatDivisionOutput(dividend, divisor, quotient, remainder) {
        const divisionString = `${divisor})${dividend}(${quotient}`.length;
        const lineLength = `${divisor})${dividend}`.length;
        const divisorLength = `${divisor})`.length;
        const multyplyLength = `${divisor * quotient}`.length;
        const horizontalLine = '-'.repeat(divisionString+4) + '<br>';

    return `${divisor})${dividend}(${quotient}<br>` +
        '&nbsp;'.repeat(divisorLength+3) + `${divisor * quotient}<br>` +
        horizontalLine +
        '&nbsp;'.repeat(lineLength+3) + `${remainder}<br>`;
    }


</script>

@endsection
