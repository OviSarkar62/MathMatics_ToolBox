@extends('layouts.app')
<style>
/* Custom Styles for the Addition Blade */
body {
    /* Left bottom corner SVG */
    background-image: url('/assets/img/multiply1.svg');
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
                        <h5>Multiplication of Fractions</h5>
                        <form id="multiplication-form">
                            <div id="input-container">
                                <!-- Static input field -->
                                <div class="input-group mb-3">
                                    <input type="number" name="numerator[]" class="form-control" placeholder="Enter numerator">
                                    <input type="number" name="denominator[]" class="form-control" placeholder="Enter denominator">
                                </div>
                            </div>
                            <button type="button" id="add-input" class="btn btn-primary">Add Input</button>
                            <button type="button" id="reset-input" class="btn btn-danger">Reset</button>
                            <button type="submit" class="btn btn-success">Calculate</button>
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

                // Reset the values of all input fields
                numeratorInput.value = '';
                denominatorInput.value = '';
            });

            const resultValues = document.getElementById('result-values');
            resultValues.innerHTML = ''; // Clear the result values
            const total = document.getElementById('total');
            total.innerHTML = '';
        });


        // Function to format a fraction
        function formatFraction(numerator, denominator) {
            if (numerator === 0) {
                return '0';
            } else if (denominator === 1) {
                return numerator.toString();
            } else {
                return `${numerator}/${denominator}`;
            }
        }

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

        // Function to multiply fractions and simplify result
        function multiplyFractions(numerator1, denominator1, numerator2, denominator2) {
            const productNumerator = numerator1 * numerator2;
            const productDenominator = denominator1 * denominator2;

            return simplifyFraction(productNumerator, productDenominator);
        }


        // Calculate multiplication on form submit
        document.getElementById('multiplication-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const numerators = document.getElementsByName('numerator[]');
            const denominators = document.getElementsByName('denominator[]');

            // Check if at least two fractions are provided
            if (numerators.length < 2) {
                document.getElementById('result-values').innerHTML = 'Please provide at least two fractions.';
                return;
            }

            let resultText = '';
            let inputText = '';

            // Initialize with the numerator and denominator of the first fraction
            let resultFraction = {
                numerator: parseInt(numerators[0].value),
                denominator: parseInt(denominators[0].value)
            };

            // Display the input fractions
            for (let i = 0; i < numerators.length; i++) {
                const numerator = parseInt(numerators[i].value);
                const denominator = parseInt(denominators[i].value);
                inputText += `${formatFraction(numerator, denominator)}`;

                if (i < numerators.length - 1) {
                    inputText += ' x ';
                }
            }

            // Multiply each subsequent fraction with the initial one
            for (let i = 1; i < numerators.length; i++) {
                const numerator = parseInt(numerators[i].value);
                const denominator = parseInt(denominators[i].value);

                // Multiply fractions and update the result
                resultFraction = multiplyFractions(
                    resultFraction.numerator,
                    resultFraction.denominator,
                    numerator,
                    denominator
                );

                if (i < numerators.length - 1) {
                    resultText += `${formatFraction(numerator, denominator)} x `;
                } else {
                    resultText += `${formatFraction(numerator, denominator)}`;
                }
            }

            // Display the simplified result
            const simplifiedResult = formatFraction(resultFraction.numerator, resultFraction.denominator);
            document.getElementById('result-values').innerHTML = `${inputText} = ${simplifiedResult}`;
        });
    </script>
@endsection
