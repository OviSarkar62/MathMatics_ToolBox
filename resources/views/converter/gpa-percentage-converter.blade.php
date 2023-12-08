@extends('layouts.app')
<style>
    body {
    /* Left bottom corner SVG */
    background-image: url('/assets/img/gpa1.svg');
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
        margin-top: 100px;
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
            margin-top: 50px;
        }
    }

    #result {
        margin-top: 20px;
        font-weight: bold;
    }
</style>

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>GPA to Percentage Converter</h5>
                    <form id="gpa-converter-form">
                        <div class="mb-3">
                            <label for="gradingScale" class="form-label">Grading Scale:</label>
                            <select id="gradingScale" class="form-select">
                                <option value="4.0">4.0</option>
                                <option value="5.0">5.0</option>
                                <option value="10.0">10.0</option>
                                <!-- Add more grading scales as needed -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="gpa" class="form-label">Enter GPA:</label>
                            <input type="number" step="0.01" id="gpa" class="form-control" placeholder="Enter GPA" required>
                        </div>
                        <button type="button" onclick="resetForm()" class="btn btn-danger">Reset</button>
                        <button type="button" onclick="convertGpa()" class="btn btn-success">Convert</button>
                        <div class="mb-3" style="display:none;" id="percentageSection">
                            <br>
                            <label for="percentage" class="form-label">Percentage:</label>
                            <span id="percentageDisplay"></span>
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
        document.getElementById("gpa-converter-form").reset();
        document.getElementById("percentageDisplay").textContent = "";
        // Hide the percentage section
        document.getElementById("percentageSection").style.display = 'none';
    };

    // Function to convert GPA to Percentage
    window.convertGpa = function () {
        // Get values from form
        var gradingScale = parseFloat(document.getElementById("gradingScale").value);
        var gpa = parseFloat(document.getElementById("gpa").value);

        console.log("Grading Scale:", gradingScale);
        console.log("GPA:", gpa);

        // Convert GPA to Percentage
        var percentage = gpa * 100 / gradingScale;

        console.log("Percentage:", percentage);

        // Display converted percentage
        var percentageDisplay = document.getElementById("percentageDisplay");
        percentageDisplay.textContent = percentage.toFixed(2) + "%";

        // Show the percentage section
        document.getElementById("percentageSection").style.display = 'block';
    };
});

</script>
@endsection
