@extends('layouts.app')
<style>
    body {
        /* Left bottom corner SVG */
        background-image: url('/assets/img/division1.svg');
        background-repeat: no-repeat, no-repeat;
        background-position: left bottom, right bottom;
        background-size: auto, auto; /* Adjust this based on your SVG sizes */
        height: 20vh;
    }

    /* Card Style */
    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);
        transition: box-shadow 0.3s ease;
        margin-top: 55px;
    }

    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    /* Form Style */
    #addition-form {
        margin-top: 20px;
    }

    /* Input Style */
    .form-control {
        border-radius: 0.25rem;
    }

    /* Button Styles */
    .btn {
        border-radius: 0.25rem;
    }

    /* Result Section Styles */
    #result {
        margin-top: 20px;
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
                        <h5>Division of Mixed Fractions</h5>
                        <form id="division-form">
                            <div id="input-container">
                                <!-- Static input field -->
                                <div class="input-group mb-3">
                                    <input type="number" name="whole[]" class="form-control" placeholder="Enter whole number">
                                    <input type="number" name="numerator[]" class="form-control" placeholder="Enter numerator">
                                    <input type="number" name="denominator[]" class="form-control" placeholder="Enter denominator">
                                </div>
                            </div>
                            <button type="button" id="add-input" class="btn btn-primary">Add Input</button>
                            <button type="button" id="reset-input" class="btn btn-danger">Reset</button>
                            <button type="button" id="calculate-button" class="btn btn-success">Calculate</button>
                        </form>
                        <hr>
                        <div id="result" class="mt-3">
                            <strong>Result:</strong>
                            <div id="result-values"></div>
                            <div id="total"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add input field on button click
        document.getElementById('add-input').addEventListener('click', function() {
            const inputContainer = document.getElementById('input-container');
            const inputGroup = document.createElement('div');
            inputGroup.classList.add('input-group', 'mb-3');

            const wholeInput = document.createElement('input');
            wholeInput.type = 'number';
            wholeInput.name = 'whole[]';
            wholeInput.classList.add('form-control');
            wholeInput.placeholder = 'Enter whole number';

            const numeratorInput = document.createElement('input');
            numeratorInput.type = 'number';
            numeratorInput.name = 'numerator[]';
            numeratorInput.classList.add('form-control');
            numeratorInput.placeholder = 'Enter numerator';

            const denominatorInput = document.createElement('input');
            denominatorInput.type = 'number';
            denominatorInput.name = 'denominator[]';
            denominatorInput.classList.add('form-control');
            denominatorInput.placeholder = 'Enter denominator';

            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.classList.add('btn', 'btn-danger', 'remove-button');
            removeButton.innerHTML = 'Remove';
            removeButton.addEventListener('click', function() {
                inputContainer.removeChild(inputGroup);
            });

            inputGroup.appendChild(wholeInput);
            inputGroup.appendChild(numeratorInput);
            inputGroup.appendChild(denominatorInput);
            inputGroup.appendChild(removeButton);
            inputContainer.appendChild(inputGroup);
        });

        // Remove input field on remove button click
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-button')) {
                const inputGroup = event.target.closest('.input-group');
                if (inputGroup && inputGroup !== document.querySelector('.input-group')) {
                    const inputContainer = document.getElementById('input-container');
                    inputContainer.removeChild(inputGroup);
                }
            }
        });

        // Reset input fields
        document.getElementById('reset-input').addEventListener('click', function() {
            const inputGroups = document.querySelectorAll('.input-group');

            inputGroups.forEach(function(inputGroup, index) {
                const numeratorInput = inputGroup.querySelector('input[name="numerator[]"]');
                const denominatorInput = inputGroup.querySelector('input[name="denominator[]"]');
                const wholeInput = inputGroup.querySelector('input[name="whole[]"]');

                // Reset the values of all input fields
                wholeInput.value = '';
                numeratorInput.value = '';
                denominatorInput.value = '';
            });

            const resultValues = document.getElementById('result-values');
            const total = document.getElementById('total');
            resultValues.innerHTML = ''; // Clear the result values
            total.innerHTML = '';
        });

        // Function to find the greatest common divisor
        function gcd(a, b) {
            return b === 0 ? a : gcd(b, a % b);
        }

        // Function to simplify a fraction
        function simplifyFraction(numerator, denominator) {
            const commonDivisor = gcd(numerator, denominator);
            return {
                numerator: numerator / commonDivisor,
                denominator: denominator / commonDivisor
            };
        }

        // Function to format a fraction
        function formatFraction(whole, numerator, denominator) {
            if (whole === 0) {
                return `${numerator}/${denominator}`;
            } else if (numerator === 0) {
                return whole.toString();
            } else {
                return `${whole} ${numerator}/${denominator}`;
            }
        }

        // Function to divide mixed fractions and simplify result
        function divideMixedFractions(whole1, numerator1, denominator1, whole2, numerator2, denominator2) {
            // Convert mixed fractions to improper fractions
            const improper1 = whole1 * denominator1 + numerator1;
            const improper2 = whole2 * denominator2 + numerator2;

            // Check if the divisor is zero
            if (improper2 === 0) {
                return {
                    whole: 0,
                    numerator: 0,
                    denominator: 1
                };
            }

            // Divide the numerators and denominators separately
            const quotientNumerator = improper1 * denominator2;
            const quotientDenominator = improper2 * denominator1;

            // Calculate the whole number, numerator, and denominator
            const quotientWhole = Math.floor(quotientNumerator / quotientDenominator);
            const quotientNumeratorRemainder = quotientNumerator % quotientDenominator;

            // Simplify the result
            const simplified = simplifyFraction(quotientNumeratorRemainder, quotientDenominator);

            return {
                whole: quotientWhole,
                numerator: simplified.numerator,
                denominator: simplified.denominator
            };
        }

        // Calculate division on button click
        document.getElementById('calculate-button').addEventListener('click', function() {
            const wholes = document.getElementsByName('whole[]');
            const numerators = document.getElementsByName('numerator[]');
            const denominators = document.getElementsByName('denominator[]');

            // Check if at least two fractions are provided
            if (wholes.length < 2) {
                document.getElementById('result-values').innerHTML = 'Please provide at least two mixed fractions.';
                return;
            }

            let resultText = '';
            let inputText = '';

            // Display the input mixed fractions
            for (let i = 0; i < wholes.length; i++) {
                const whole = parseInt(wholes[i].value);
                const numerator = parseInt(numerators[i].value);
                const denominator = parseInt(denominators[i].value);
                inputText += `${formatFraction(whole, numerator, denominator)}`;

                if (i < wholes.length - 1) {
                    inputText += ' ÷ ';
                }
            }

            inputText += '<br>'; // Add line breaks between input mixed fractions

            // Initialize with the whole, numerator, and denominator of the first mixed fraction
            let resultFraction = {
                whole: parseInt(wholes[0].value),
                numerator: parseInt(numerators[0].value),
                denominator: parseInt(denominators[0].value)
            };

            // Divide each subsequent mixed fraction by the initial one
            for (let i = 1; i < wholes.length; i++) {
                const whole = parseInt(wholes[i].value);
                const numerator = parseInt(numerators[i].value);
                const denominator = parseInt(denominators[i].value);
                const result = divideMixedFractions(
                    resultFraction.whole,
                    resultFraction.numerator,
                    resultFraction.denominator,
                    whole,
                    numerator,
                    denominator
                );

                resultFraction = result;

                resultText += `${formatFraction(result.whole, result.numerator, result.denominator)}`;

                if (i < wholes.length - 1) {
                    resultText += ' ÷ ';
                }
            }

            document.getElementById('result-values').innerHTML = `${inputText} = ${formatFraction(resultFraction.whole, resultFraction.numerator, resultFraction.denominator)}`;
        });
    </script>
@endsection
