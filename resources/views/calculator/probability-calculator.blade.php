@extends('layouts.app')

<style>

    body {
    /* Left bottom corner SVG */
    background-image: url('/assets/img/pro1.svg');
    background-repeat: no-repeat, no-repeat;
    background-position: left bottom, right bottom;
    background-size: auto, auto; /* Adjust this based on your SVG sizes */
    height: 20vh;
    }

    .container {
        max-width: 800px;
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

    /* Responsive adjustments */
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
<!-- HTML Code -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Probability Calculator</h5>
                    <form id="probability-calculator-form">
                        <div class="mb-3">
                            <label for="probA" class="form-label">Enter probability for A (between 0 and 1):</label>
                            <input type="number" step="0.01" min="0" max="1" name="probA" id="probA" class="form-control" placeholder="Probability for A">
                        </div>
                        <div class="mb-3">
                            <label for="probB" class="form-label">Enter probability for B (between 0 and 1):</label>
                            <input type="number" step="0.01" min="0" max="1" name="probB" id="probB" class="form-control" placeholder="Probability for B">
                        </div>
                        <div id="probability-results">
                            <p id="result" class="h6">Result: </p>
                            <p id="resultNotA" class="h6">Probability of A NOT occurring: </p>
                            <p id="resultNotB" class="h6">Probability of B NOT occurring: </p>
                            <p id="resultAnd" class="h6">Probability of A and B both occurring: </p>
                            <p id="resultOr" class="h6">Probability that A or B or both occur: </p>
                            <p id="resultXOR" class="h6">Probability that A or B occurs but NOT both: </p>
                            <p id="resultNotBoth" class="h6">Probability of neither A nor B occurring: </p>
                            <p id="resultAnotB" class="h6">Probability of A occurring but NOT B: </p>
                            <p id="resultBnotA" class="h6">Probability of B occurring but NOT A: </p>
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
        const probAInput = document.getElementById('probA');
        const probBInput = document.getElementById('probB');
        const probabilityResults = document.getElementById('probability-results');
        const resultNotA = document.getElementById('resultNotA');
        const resultNotB = document.getElementById('resultNotB');
        const resultAnd = document.getElementById('resultAnd');
        const resultOr = document.getElementById('resultOr');
        const resultXOR = document.getElementById('resultXOR');
        const resultNotBoth = document.getElementById('resultNotBoth');
        const resultAnotB = document.getElementById('resultAnotB');
        const resultBnotA = document.getElementById('resultBnotA');
        const calculateButton = document.getElementById('calculate');
        const resetButton = document.getElementById('reset');

        // Initially hide the probability results
        probabilityResults.style.display = 'none';

        // Add an event listener to the "Calculate" button
        calculateButton.addEventListener('click', function () {
            calculateProbabilities();
        });

        // Add an event listener to the "Reset" button
        resetButton.addEventListener('click', function () {
            resetForm();
        });

        function calculateProbabilities() {
            const probA = parseFloat(probAInput.value);
            const probB = parseFloat(probBInput.value);

            // Check if the input values are valid probabilities
            if (isValidProbability(probA) && isValidProbability(probB)) {
                resultNotA.textContent = `Probability of A NOT occurring: ${calculateNotProbability(probA).toFixed(2)}`;
                resultNotB.textContent = `Probability of B NOT occurring: ${calculateNotProbability(probB).toFixed(2)}`;
                resultAnd.textContent = `Probability of A and B both occurring: ${calculateAndProbability(probA, probB).toFixed(2)}`;
                resultOr.textContent = `Probability that A or B or both occur: ${calculateEitherProbability(probA, probB).toFixed(2)}`;
                resultXOR.textContent = `Probability that A or B occurs but NOT both: ${calculateXORProbability(probA, probB).toFixed(2)}`;
                resultNotBoth.textContent = `Probability of neither A nor B occurring: ${calculateNotEitherProbability(probA, probB).toFixed(2)}`;
                resultAnotB.textContent = `Probability of A occurring but NOT B: ${calculateAnotBProbability(probA, probB).toFixed(2)}`;
                resultBnotA.textContent = `Probability of B occurring but NOT A: ${calculateBnotAProbability(probA, probB).toFixed(2)}`;
                probabilityResults.style.display = 'block';
            } else {
                alert('Please enter valid probabilities between 0 and 1.');
            }
        }

        function resetForm() {
            probAInput.value = '';
            probBInput.value = '';
            probabilityResults.style.display = 'none';
        }

        function isValidProbability(probability) {
            return !isNaN(probability) && probability >= 0 && probability <= 1;
        }

        function calculateNotProbability(probability) {
            return 1 - probability;
        }

        function calculateAndProbability(probA, probB) {
            return probA * probB;
        }

        function calculateEitherProbability(probA, probB) {
            return probA + probB - calculateAndProbability(probA, probB);
        }

        function calculateXORProbability(probA, probB) {
            return calculateEitherProbability(probA, probB) - calculateAndProbability(probA, probB);
        }

        function calculateNotEitherProbability(probA, probB) {
            return 1 - calculateEitherProbability(probA, probB);
        }

        function calculateAnotBProbability(probA, probB) {
            return probA - calculateAndProbability(probA, probB);
        }

        function calculateBnotAProbability(probA, probB) {
            return probB - calculateAndProbability(probA, probB);
        }
    });
</script>


@endsection
