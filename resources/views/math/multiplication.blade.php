@extends('layouts.app')
<style>

    body {
        /* Left bottom corner SVG */
        background-image: url('/assets/img/multiply1.svg');
        background-repeat: no-repeat, no-repeat;
        background-position: left bottom, right bottom;
        background-size: auto, auto; /* Adjust this based on your SVG sizes */
        height: 20vh;
    }

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
                        <h5>Multiplication of Integer</h5>
                        <form id="multiplication-form">
                            <div id="input-container">
                                <input type="number" name="values[]" class="form-control mb-3" placeholder="Enter a number">
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
            const input = document.createElement('div');
            input.classList.add('input-group', 'mb-3');

            const inputField = document.createElement('input');
            inputField.type = 'number';
            inputField.name = 'values[]';
            inputField.classList.add('form-control');
            inputField.placeholder = 'Enter a number';

            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.classList.add('btn', 'btn-danger');
            removeButton.innerHTML = 'Remove';
            removeButton.addEventListener('click', function() {
                inputContainer.removeChild(input);
            });

            input.appendChild(inputField);
            input.appendChild(removeButton);
            inputContainer.appendChild(input);
        });

        // Reset input fields
        document.getElementById('reset-input').addEventListener('click', function() {
            const inputFields = document.getElementsByName('values[]');
            inputFields.forEach(function(inputField) {
                inputField.value = ''; // Clear the input field values
            });

            const resultValues = document.getElementById('result-values');
            const total = document.getElementById('total');
            resultValues.innerHTML = ''; // Clear the result values
            total.innerHTML = '';
        });

        // Calculate multiplication on form submit
        document.getElementById('multiplication-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const values = document.getElementsByName('values[]');
            let product = 1;
            let resultText = '';

            for (const value of values) {
                if (value.value) {
                    const number = parseInt(value.value);
                    product *= number;
                    resultText += number + '<br>';
                }
            }

            if (product !== 1) {
                const horizontalLine = '-'.repeat(resultText.length) + '<br>';
                resultText += `${horizontalLine}`;
                resultText += product;
                document.getElementById('result-values').innerHTML = resultText;
            } else {
                document.getElementById('result-values').innerHTML = '';
                document.getElementById('total').innerHTML = '';
            }
        });

    </script>
@endsection
