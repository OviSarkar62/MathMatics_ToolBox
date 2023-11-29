@extends('layouts.app')
<style>

    /* Card Style */
    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
        margin-top: 80px;
    }

    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    /* Input Style */
    .form-control {
        border-radius: 0.25rem;
    }

    /* Button Styles */
    .btn {
        border-radius: 0.25rem;
    }


    /* Responsive Design */
    @media (max-width: 576px) {
        .card {
            margin-top: 20px;
        }
    }

    @media (max-width: 768px) {
        .card {
            margin-top: 40px;
        }
    }

    @media (max-width: 992px) {
        .card {
            margin-top: 60px;
        }
    }

    @media (max-width: 1200px) {
        .card {
            margin-top: 80px;
        }
    }
</style>
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5>Addition of Fractions</h5>
                        <form id="addition-form">
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

                if (index === 0) {
                    // Reset static input fields
                    numeratorInput.value = '';
                    denominatorInput.value = '';
                } else {
                    // Remove dynamically added input fields
                    inputGroup.parentNode.removeChild(inputGroup);
                }
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

    // Calculate addition on form submit
    document.getElementById('addition-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const numerators = document.getElementsByName('numerator[]');
        const denominators = document.getElementsByName('denominator[]');
        let resultText = '';

        let commonDenominator = 1;
        for (const denominator of denominators) {
            if (denominator.value) {
                commonDenominator *= parseInt(denominator.value);
            }
        }

        let sumNumerator = 0;
        for (let i = 0; i < numerators.length; i++) {
            if (numerators[i].value) {
                const numerator = parseInt(numerators[i].value);
                sumNumerator += numerator * (commonDenominator / parseInt(denominators[i].value));
                resultText += `${numerator}/${denominators[i].value}<br>`;
            }
        }

        if (sumNumerator > 0) {
            resultText += '----------------------------------------<br>';
            const simplifiedResult = simplifyFraction(sumNumerator, commonDenominator);
            resultText += `${simplifiedResult.numerator}/${simplifiedResult.denominator}`;
            document.getElementById('result-values').innerHTML = resultText;
        } else {
            document.getElementById('result-values').innerHTML = '';
            document.getElementById('total').innerHTML = '';
        }
    });

    </script>
@endsection
