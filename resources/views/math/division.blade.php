@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5>Division</h5>
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
        return `${divisor})${dividend}(${quotient}<br>` +
        ' '.repeat(`${divisor})${dividend}(${quotient}`.length) + `${divisor * quotient}<br>` +
        ' '.repeat(`${divisor})${dividend}(${quotient}`.length) + '---------------------<br>' +
        ' '.repeat(`${divisor})${dividend}(${quotient}`.length) + `${remainder}<br>`;
    }
</script>

@endsection
