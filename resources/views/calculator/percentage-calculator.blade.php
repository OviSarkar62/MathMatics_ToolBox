@extends('layouts.app')

<style>
    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .row {
        display: flex;
        justify-content: center;
        align-items: stretch; /* Make all cards have the same height */
    }

    .col-md-3 {
        flex: 0 0 28%; /* Adjust width for larger screens */
        max-width: 28%; /* Adjust width for larger screens */
        margin: 15px; /* Adjust spacing between cards */
    }

    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
        width: 100%; /* Make all cards have the same width */
        height: 100%; /* Set a fixed height for all cards */
        margin-top: 80px;
    }

    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-body {
        padding: 10px;
    }

    .form-label {
        font-weight: bold;
    }

    .btn {
        margin-top: 10px;
    }

    /* Responsive adjustments */
    @media (max-width: 767px) {
        .col-md-3 {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }
</style>

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <!-- Percentage Calculator Cards -->

                    <!-- 1st Percentage Calculator Card -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h5>Percentage Calculator 1</h5>
                                <form id="percentage-form-1">
                                    <div class="mb-3 row">
                                        <label for="originalValue1" class="form-label">What is</label>
                                        <div class="col-sm-9 input-group">
                                            <input type="number" id="percent1" class="form-control"
                                                placeholder="Enter Input">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                    <label for="originalValue2" class="form-label">of</label>
                                        <div class="mb-3 row">
                                            <label for="originalValue1" class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9 input-group">
                                                <input type="number" id="value1" class="form-control"
                                                    placeholder="Enter Input">
                                            </div>
                                        </div>
                                    <div class="mt-3">
                                        <button type="button" id="reset1" class="btn btn-danger">Reset</button>
                                        <button type="button" id="calculate1" class="btn btn-success">Calculate</button>
                                    </div>
                                    <br>
                                    <p id="result1" class="result-label hidden">Result: <span id="output1"></span></p>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- 2nd Percentage Calculator Card -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h5>Percentage Calculator 2</h5>
                                <form id="percentage-form-3">
                                    <div class="mb-3">
                                        <label for="originalValue3" class="form-label">Percentage
                                            increase/decrease from</label>
                                        <div class="mb-3 row">
                                            <div class="col-sm-9 input-group">
                                                <input type="number" id="originalValue3" class="form-control"
                                                    placeholder="Enter Input">
                                            </div>
                                        </div>
                                        <label for="newValue3" class="form-label">to</label>
                                        <div class="mb-3 row">
                                            <label for="newValue3" class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9 input-group">
                                                <input type="number" id="newValue3" class="form-control"
                                                    placeholder="Enter Input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <button type="button" id="reset3" class="btn btn-danger">Reset</button>
                                        <button type="button" id="calculate3" class="btn btn-success">Calculate</button>
                                    </div>
                                    <br>
                                    <p id="result3" class="result-label hidden">Result: <span id="output3"></span></p>
                                </form>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
    // Percentage Calculator 1
    const percent1Input = document.getElementById('percent1');
    const value1Input = document.getElementById('value1');
    const output1Span = document.getElementById('output1');
    const resetButton1 = document.getElementById('reset1');
    const calculateButton1 = document.getElementById('calculate1');
    const result1Paragraph = document.getElementById('result1');

    calculateButton1.addEventListener('click', function () {
        const percent1 = parseFloat(percent1Input.value);
        const value1 = parseFloat(value1Input.value);
        const result1 = (percent1 / 100) * value1;
        output1Span.textContent = isNaN(result1) ? 'Invalid input' : result1.toFixed(2);
        result1Paragraph.classList.toggle('hidden', isNaN(result1)); // Show the result label if there is valid output
    });

    resetButton1.addEventListener('click', function () {
        percent1Input.value = '';
        value1Input.value = '';
        output1Span.textContent = '';
        result1Paragraph.classList.add('hidden'); // Hide the result label
    });

    // Percentage Calculator 3
    const originalValue3Input = document.getElementById('originalValue3');
    const newValue3Input = document.getElementById('newValue3');
    const output3Span = document.getElementById('output3');
    const resetButton3 = document.getElementById('reset3');
    const calculateButton3 = document.getElementById('calculate3');
    const result3Paragraph = document.getElementById('result3');

    calculateButton3.addEventListener('click', function () {
        const originalValue3 = parseFloat(originalValue3Input.value);
        const newValue3 = parseFloat(newValue3Input.value);
        const result3 = ((newValue3 - originalValue3) / originalValue3) * 100;
        output3Span.textContent = isNaN(result3) ? 'Invalid input' : result3.toFixed(2);
        result3Paragraph.classList.toggle('hidden', isNaN(result3)); // Show the result label if there is valid output
    });

    resetButton3.addEventListener('click', function () {
        originalValue3Input.value = '';
        newValue3Input.value = '';
        output3Span.textContent = '';
        result3Paragraph.classList.add('hidden'); // Hide the result label
    });
});


    </script>
@endsection
