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
                        <h5>Subtraction of Integer</h5>
                        <form id="subtraction-form">
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
            const removeButton = document.createElement('button');

            inputField.type = 'number';
            inputField.name = 'values[]';
            inputField.classList.add('form-control');
            inputField.placeholder = 'Enter a number';

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
            const resultValues = document.getElementById('result-values');
            const total = document.getElementById('total');

            resultValues.innerHTML = ''; // Clear the result values
            total.innerHTML = '';

            const inputFields = document.getElementsByName('values[]');
            inputFields.forEach(function(inputField) {
                inputField.value = ''; // Clear the input field values
            });
        });

        // Calculate subtraction on form submit
        document.getElementById('subtraction-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const values = document.getElementsByName('values[]');
        let result = 0;
        let resultText = '';

        for (let i = 0; i < values.length; i++) {
            if (values[i].value) {
                const number = parseFloat(values[i].value);
                if (i === 0) {
                    result = number;
                    resultText += number + '<br>';
                } else {
                    result -= number;
                    resultText += values[i].value + '<br>';
                }
            }
        }

        if (resultText !== '') {
            resultText = resultText.slice(0, -4); // Remove the last '<br>'
            const horizontalLine = '-'.repeat(resultText.length) + '<br>';
            resultText += `<br>${horizontalLine}`;
            resultText += result;
            document.getElementById('result-values').innerHTML = resultText;
        } else {
            document.getElementById('result-values').innerHTML = '';
            document.getElementById('total').innerHTML = '';
        }
    });
    </script>
@endsection
