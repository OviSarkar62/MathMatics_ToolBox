@extends('layouts.app')
<style>
    body {
    /* Left bottom corner SVG */
    background-image: url('/assets/img/rate1.svg');
    background-repeat: no-repeat, no-repeat;
    background-position: left bottom, right bottom;
    background-size: auto, auto; /* Adjust this based on your SVG sizes */
    height: 20vh;
    }

    .container {
        max-width: 600px;
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

    #result {
        margin-top: 20px;
        font-weight: bold;
    }
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Interest Rate Converter</h5>
                    <form id="compound-interest-form">
                        <div class="mb-3">
                            <label for="principal" class="form-label">Principal Amount:</label>
                            <input type="number" step="0.01" id="principal" class="form-control" placeholder="Enter principal amount" required>
                        </div>
                        <div class="mb-3">
                            <label for="interestRate" class="form-label">Annual Interest Rate (%):</label>
                            <input type="number" step="0.01" id="interestRate" class="form-control" placeholder="Enter annual interest rate" required>
                        </div>
                        <div class="mb-3">
                            <label for="compoundingFrequency" class="form-label">Compounding Frequency:</label>
                            <select id="compoundingFrequency" class="form-select">
                                <option value="1">Annually</option>
                                <option value="2">Semiannually</option>
                                <option value="4">Quarterly</option>
                                <option value="12">Monthly</option>
                                <!-- Add more compounding frequencies as needed -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="timePeriod" class="form-label">Time Period (years):</label>
                            <input type="number" step="0.01" id="timePeriod" class="form-control" placeholder="Enter time period in years" required>
                        </div>
                        <button type="button" onclick="resetForm()" class="btn btn-danger">Reset</button>
                        <button type="button" onclick="calculateCompoundInterest()" class="btn btn-success">Calculate</button>
                        <div class="mb-3" style="display:none;" id="compoundInterestSection">
                            <br>
                            <label for="compoundInterest" class="form-label">Compound Interest:</label>
                            <span id="compoundInterestDisplay"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    // Function to reset the form
    window.resetForm = function () {
        document.getElementById("compound-interest-form").reset();
        document.getElementById("compoundInterestDisplay").textContent = "";
        // Hide the compound interest section
        document.getElementById("compoundInterestSection").style.display = 'none';
    };

    // Function to calculate compound interest
    window.calculateCompoundInterest = function () {
        // Get values from form
        var principal = parseFloat(document.getElementById("principal").value);
        var interestRate = parseFloat(document.getElementById("interestRate").value) / 100; // convert to decimal
        var compoundingFrequency = parseInt(document.getElementById("compoundingFrequency").value);
        var timePeriod = parseFloat(document.getElementById("timePeriod").value);

        console.log("Principal:", principal);
        console.log("Interest Rate:", interestRate);
        console.log("Compounding Frequency:", compoundingFrequency);
        console.log("Time Period:", timePeriod);

        // Calculate compound interest
        var compoundInterest = principal * Math.pow(1 + interestRate / compoundingFrequency, compoundingFrequency * timePeriod) - principal;

        console.log("Compound Interest:", compoundInterest);

        // Display calculated compound interest
        var compoundInterestDisplay = document.getElementById("compoundInterestDisplay");
        compoundInterestDisplay.textContent = compoundInterest.toFixed(2);

        // Show the compound interest section
        document.getElementById("compoundInterestSection").style.display = 'block';
    };
});


</script>

@endsection
