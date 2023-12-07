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

    #validation-error {
        margin-top: 10px;
    }

    #binary-result {
        margin-top: 20px;
        display: none;
    }

    #binary-value {
        font-size: 1.2rem;
    }
</style>
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Hexadecimal Converter</h5>
                    <form id="number-converter-form">
                        <div class="mb-3">
                            <label for="number-system" class="form-label">Choose a number system:</label>
                            <select name="number-system" id="number-system" class="form-select">
                                <option value="binary">Binary</option>
                                <option value="decimal">Decimal</option>
                                <option value="octal">Octal</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="number" class="form-label">Enter a number:</label>
                            <input type="text" name="number" id="number" class="form-control" placeholder="Number">
                            <p id="validation-error" style="color: red;"></p>
                        </div>
                        <div id="hexadecimal-result" style="display: none;">
                            <h6 id="hexadecimal-value">Hexadecimal: </h6>
                        </div>
                        <div class="mt-3">
                            <button type="reset" id="reset" class="btn btn-danger">Reset</button>
                            <button type="button" id="calculate" class="btn btn-success">Calculate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const numberSystem = document.getElementById('number-system');
        const numberInput = document.getElementById('number');
        const hexadecimalResult = document.getElementById('hexadecimal-result');
        const hexadecimalValue = document.getElementById('hexadecimal-value');
        const calculateButton = document.getElementById('calculate');
        const resetButton = document.getElementById('reset');
        const validationError = document.getElementById('validation-error');

        // Add an event listener to the "Calculate" button
        calculateButton.addEventListener('click', function () {
            convertToHexadecimal();
        });

        // Add an event listener to the "Reset" button
        resetButton.addEventListener('click', function () {
            resetForm();
        });

        function convertToHexadecimal() {
            const selectedNumberSystem = numberSystem.value;
            const inputNumber = numberInput.value.trim();

            // Regular expressions for input validation
            const binaryPattern = /^[01]+$/;
            const decimalPattern = /^[0-9]+$/;
            const octalPattern = /^[0-7]+$/;

            let validInput = true;

            if (selectedNumberSystem === 'binary') {
                validInput = binaryPattern.test(inputNumber);
            } else if (selectedNumberSystem === 'decimal') {
                validInput = decimalPattern.test(inputNumber);
            } else if (selectedNumberSystem === 'octal') {
                validInput = octalPattern.test(inputNumber);
            }

            if (validInput) {
                validationError.textContent = '';
                const inputBase = (selectedNumberSystem === 'octal') ? 8 : (selectedNumberSystem === 'binary') ? 2 : 10;
                const convertedNumber = parseInt(inputNumber, inputBase).toString(16).toUpperCase();
                hexadecimalValue.textContent = `Hexadecimal: ${convertedNumber}`;
                hexadecimalResult.style.display = 'block';
            } else {
                validationError.textContent = 'Invalid input for the selected number system.';
                hexadecimalResult.style.display = 'none';
            }
        }

        function resetForm() {
            numberSystem.value = 'decimal';
            numberInput.value = '';
            validationError.textContent = '';
            hexadecimalResult.style.display = 'none';
        }
    });
</script>

@endsection
