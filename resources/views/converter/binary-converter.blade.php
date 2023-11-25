@extends('layouts.app')
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa; /* Light background color */
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
    }

    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
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
        font-size: 1.5rem;
    }
</style>

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Binary Converter</h5>
                    <form id="number-converter-form">
                        <div class="mb-3">
                            <label for="number-system" class="form-label">Choose a number system:</label>
                            <select name="number-system" id="number-system" class="form-select">
                                <option value="decimal">Decimal</option>
                                <option value="octal">Octal</option>
                                <option value="hexadecimal">Hexadecimal</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="number" class="form-label">Enter a number:</label>
                            <input type="text" name="number" id="number" class="form-control" placeholder="Number">
                            <p id="validation-error" style="color: red;"></p>
                        </div>
                        <div id="binary-result" style="display: none;">
                            <h3 id="binary-value">Binary: </h3>
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
        const binaryResult = document.getElementById('binary-result');
        const binaryValue = document.getElementById('binary-value');
        const calculateButton = document.getElementById('calculate');
        const resetButton = document.getElementById('reset');
        const validationError = document.getElementById('validation-error');

        // Add an event listener to the "Calculate" button
        calculateButton.addEventListener('click', function () {
            convertToBinary();
        });

        // Add an event listener to the "Reset" button
        resetButton.addEventListener('click', function () {
            resetForm();
        });

        function convertToBinary() {
            const selectedNumberSystem = numberSystem.value;
            const inputNumber = numberInput.value.trim();

            // Regular expressions for input validation
            const decimalPattern = /^[0-9]+$/;
            const octalPattern = /^[0-7]+$/;
            const hexPattern = /^[0-9A-Fa-f]+$/;

            let validInput = true;

            if (selectedNumberSystem === 'decimal') {
                validInput = decimalPattern.test(inputNumber);
            } else if (selectedNumberSystem === 'octal') {
                validInput = octalPattern.test(inputNumber);
            } else if (selectedNumberSystem === 'hexadecimal') {
                validInput = hexPattern.test(inputNumber);
            }

            if (validInput) {
                validationError.textContent = '';
                const inputBase = (selectedNumberSystem === 'hexadecimal') ? 16 : (selectedNumberSystem === 'octal') ? 8 : 10;
                const convertedNumber = parseInt(inputNumber, inputBase).toString(2);
                binaryValue.textContent = `Binary: ${convertedNumber}`;
                binaryResult.style.display = 'block';
            } else {
                validationError.textContent = 'Invalid input for the selected number system.';
                binaryResult.style.display = 'none';
            }
        }

        function resetForm() {
            numberSystem.value = 'decimal';
            numberInput.value = '';
            validationError.textContent = '';
            binaryResult.style.display = 'none';
        }
    });
</script>

@endsection
