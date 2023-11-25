@extends('layouts.app')
<style>
    /* Add this style to your existing CSS file or create a new one */

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

</style>
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>BMI Calculator</h5>
                    <form id="bmi-calculator-form">
                        <div class="mb-3">
                            <label for="weight-unit" class="form-label">Select Weight Unit:</label>
                            <select name="weight-unit" id="weight-unit" class="form-select">
                                <option value="lbs">Pounds</option>
                                <option value="kgs">Kilograms</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="height-unit" class="form-label">Select Height Unit:</label>
                            <select name="height-unit" id="height-unit" class="form-select">
                                <option value="inches">Inches</option>
                                <option value="cm">Centimeters</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="weight" class="form-label">Enter Weight:</label>
                            <input type="number" name="weight" id="weight" class="form-control" placeholder="Weight">
                        </div>
                        <div class="mb-3">
                            <label for="height" class="form-label">Enter Height:</label>
                            <input type="number" name="height" id="height" class="form-control" placeholder="Height">
                        </div>
                        <div id="bmi-results">
                            <p id="bmi-value" class="h3">BMI: </p>
                            <p id="bmi-classification" class="h3">Classification: </p>
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
        const weightUnit = document.getElementById('weight-unit');
        const heightUnit = document.getElementById('height-unit');
        const weightInput = document.getElementById('weight');
        const heightInput = document.getElementById('height');
        const bmiValue = document.getElementById('bmi-value');
        const bmiClassification = document.getElementById('bmi-classification');
        const bmiResults = document.getElementById('bmi-results');
        const calculateButton = document.getElementById('calculate');
        const resetButton = document.getElementById('reset');

        // Add an event listener to the "Calculate" button
        calculateButton.addEventListener('click', function () {
            calculateBMI();
        });

        // Add an event listener to the "Reset" button
        resetButton.addEventListener('click', function () {
            resetForm();
        });

        function calculateBMI() {
            const selectedWeightUnit = weightUnit.value;
            const selectedHeightUnit = heightUnit.value;
            const weight = parseFloat(weightInput.value);
            const height = parseFloat(heightInput.value);

            // Check if the input values are valid numbers
            if (isNaN(weight) || isNaN(height)) {
                alert('Please enter valid weight and height.');
                return;
            }

            // Convert weight and height units to standard units
            const weightInKilograms = selectedWeightUnit === 'lbs' ? weight * 0.453592 : weight;
            const heightInMeters = selectedHeightUnit === 'inches' ? height * 0.0254 : height * 0.01;

            // Calculate the BMI
            const bmi = weightInKilograms / (heightInMeters * heightInMeters);

            // Display the BMI and classification
            bmiValue.textContent = 'BMI: ' + bmi.toFixed(2);
            bmiClassification.textContent = 'Classification: ' + classifyBMI(bmi);

            // Show the results
            bmiResults.style.display = 'block';
        }

        function classifyBMI(bmi) {
            // Your BMI classification logic here
            if (bmi < 16) {
                return 'Severe Thinness';
            } else if (bmi < 17) {
                return 'Moderate Thinness';
            } else if (bmi < 18.5) {
                return 'Mild Thinness';
            } else if (bmi < 25) {
                return 'Normal';
            } else if (bmi < 30) {
                return 'Overweight';
            } else if (bmi < 35) {
                return 'Obese Class I';
            } else if (bmi < 40) {
                return 'Obese Class II';
            } else {
                return 'Obese Class III';
            }
        }

        function resetForm() {
            weightUnit.value = 'lbs';
            heightUnit.value = 'inches';
            weightInput.value = '';
            heightInput.value = '';
            bmiValue.textContent = 'BMI: ';
            bmiClassification.textContent = 'Classification: ';
            bmiResults.style.display = 'none';
        }
    });
</script>


@endsection
