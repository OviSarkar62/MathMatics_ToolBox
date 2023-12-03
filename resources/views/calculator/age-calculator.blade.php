@extends('layouts.app')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">
<style>
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
        margin-top: 80px;
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
                    <h5>Age Calculator</h5>
                    <form id="age-calculator-form">
                        <div class="row mb-3">
                            <!-- DOB Fields (Year, Month, Day) -->
                            <div class="col-md-4">
                                <label for="dob-year" class="form-label">Year of Birth:</label>
                                <input type="number" name="dob-year" id="dob-year" class="form-control" placeholder="Year" min="01" max="2500">
                            </div>
                            <div class="col-md-4">
                                <label for="dob-month" class="form-label">Month of Birth:</label>
                                <select name="dob-month" id="dob-month" class="form-select">
                                            <option value="1">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="dob-day" class="form-label">Day of Birth:</label>
                                <select name="dob-day" id="dob-day" class="form-select">
                                    <!-- Add day options here -->
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <!-- Age at the Date of Fields (Year, Month, Day) -->
                            <div class="col-md-4">
                                <label for="at-year" class="form-label">Year at the Age of:</label>
                                <input type="number" name="at-year" id="at-year" class="form-control" placeholder="Year" min="01" max="2500">
                            </div>
                            <div class="col-md-4">
                                <label for="at-month" class="form-label">Month at the Age of:</label>
                                <select name="at-month" id="at-month" class="form-select">
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="at-day" class="form-label">Day at the Age of:</label>
                                <select name="at-day" id="at-day" class="form-select">
                                    <!-- Add day options here -->
                                </select>
                            </div>
                        </div>
                        <div id="age-results">
                            <p id="age-output">Age will be displayed here.</p>
                        </div>
                        <div class="mt-3">
                            <button type="button" id="reset" class="btn btn-danger" onclick="handleReset()">Reset</button>
                            <button type="button" id="calculate" class="btn btn-success">Calculate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to populate days based on selected month and year
        function populateDays(year, month, daySelect) {
            const daysInMonth = new Date(year, month, 0).getDate();
            daySelect.innerHTML = "";
            for (let day = 1; day <= daysInMonth; day++) {
                const option = document.createElement("option");
                option.value = day;
                option.textContent = day;
                daySelect.appendChild(option);
            }
        }

        // Function to calculate age
        function calculateAge() {
            const dobYear = parseInt(document.getElementById('dob-year').value);
            const dobMonth = parseInt(document.getElementById('dob-month').value);
            const dobDay = parseInt(document.getElementById('dob-day').value);

            const atYear = parseInt(document.getElementById('at-year').value);
            const atMonth = parseInt(document.getElementById('at-month').value);
            const atDay = parseInt(document.getElementById('at-day').value);

            const dobDate = new Date(dobYear, dobMonth - 1, dobDay);
            const atDate = new Date(atYear, atMonth - 1, atDay);

            let ageInYears = atYear - dobYear;
            let ageInMonths = atMonth - dobMonth;
            let ageInDays = atDay - dobDay;

            // Adjust negative values
            if (ageInDays < 0) {
                const daysInLastMonth = new Date(atYear, atMonth, 0).getDate();
                ageInDays += daysInLastMonth;
                ageInMonths--;
            }

            if (ageInMonths < 0) {
                ageInMonths += 12;
                ageInYears--;
            }

            // Display the result
            const ageOutput = document.getElementById('age-output');
            ageOutput.textContent = `Age: ${ageInYears} years, ${ageInMonths} months, ${ageInDays} days`;
        }

        // Event listener for the month and year change to populate days
        const dobYearSelect = document.getElementById('dob-year');
        const dobMonthSelect = document.getElementById('dob-month');
        const atYearSelect = document.getElementById('at-year');
        const atMonthSelect = document.getElementById('at-month');

        dobYearSelect.addEventListener('change', function() {
            populateDays(dobYearSelect.value, dobMonthSelect.value, document.getElementById('dob-day'));
        });

        dobMonthSelect.addEventListener('change', function() {
            populateDays(dobYearSelect.value, dobMonthSelect.value, document.getElementById('dob-day'));
        });

        atYearSelect.addEventListener('change', function() {
            populateDays(atYearSelect.value, atMonthSelect.value, document.getElementById('at-day'));
        });

        atMonthSelect.addEventListener('change', function() {
            populateDays(atYearSelect.value, atMonthSelect.value, document.getElementById('at-day'));
        });

        // Event listener for the calculate button
        const calculateButton = document.getElementById('calculate');
        calculateButton.addEventListener('click', calculateAge);

        // Event listener for the reset button
        const resetButton = document.getElementById('reset');
        resetButton.addEventListener('click', handleReset);
        function handleReset() {
            // Reset form and result
            document.getElementById('age-calculator-form').reset();
            document.getElementById('age-output').textContent = 'Age will be displayed here.';

            // Manually reset the day options
            populateDays(dobYearSelect.value, dobMonthSelect.value, document.getElementById('dob-day'));
            populateDays(atYearSelect.value, atMonthSelect.value, document.getElementById('at-day'));
        }
    });
    </script>
@endsection

