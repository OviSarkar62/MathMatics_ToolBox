@extends('layouts.app')

<style>
    body {
    /* Left bottom corner SVG */
    background-image: url('/assets/img/age1.svg');
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
            margin-top: 50px;
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
                            <p id="age-output"></p>
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


<script>
    function populateDays(yearSelect, monthSelect, daySelect) {
        const selectedYear = parseInt(yearSelect.value);
        const selectedMonth = parseInt(monthSelect.value);
        const daysInMonth = new Date(selectedYear, selectedMonth, 0).getDate();

        // Clear existing options
        daySelect.options.length = 0;

        // Populate day options
        for (let i = 1; i <= daysInMonth; i++) {
            const option = document.createElement('option');
            option.value = i;
            option.textContent = i;
            daySelect.appendChild(option);
        }
    }

    // Function to check if a year is a leap year
    function isLeapYear(year) {
        return (year % 4 === 0 && year % 100 !== 0) || (year % 400 === 0);
    }

    // Function to adjust day options based on leap year
    function adjustDayOptions(daySelect, isLeap, selectedMonth, selectedYear) {
        // Clear existing options
        daySelect.options.length = 0;

        // Define the maximum number of days for each month
        const maxDaysByMonth = [31, isLeap ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

        // Populate day options
        for (let i = 1; i <= maxDaysByMonth[selectedMonth - 1]; i++) {
            const option = document.createElement('option');
            option.value = i;
            option.textContent = i;
            daySelect.appendChild(option);
        }
    }

    // Event listener for changes in the "dob-year" select
    document.getElementById('dob-year').addEventListener('input', function () {
        const yearSelect = this;
        const monthSelect = document.getElementById('dob-month');
        const daySelect = document.getElementById('dob-day');

        populateDays(yearSelect, monthSelect, daySelect);

        // Adjust day options based on leap year
        const isLeap = isLeapYear(parseInt(yearSelect.value));
        adjustDayOptions(daySelect, isLeap, parseInt(monthSelect.value), parseInt(yearSelect.value));
    });

    // Event listener for changes in the "dob-month" select
    document.getElementById('dob-month').addEventListener('change', function () {
        const yearSelect = document.getElementById('dob-year');
        const monthSelect = this;
        const daySelect = document.getElementById('dob-day');

        populateDays(yearSelect, monthSelect, daySelect);

        // Adjust day options based on leap year
        const isLeap = isLeapYear(parseInt(yearSelect.value));
        adjustDayOptions(daySelect, isLeap, parseInt(monthSelect.value), parseInt(yearSelect.value));
    });

    // Event listener for changes in the "at-year" select
    document.getElementById('at-year').addEventListener('input', function () {
        const yearSelect = this;
        const monthSelect = document.getElementById('at-month');
        const daySelect = document.getElementById('at-day');

        populateDays(yearSelect, monthSelect, daySelect);

        // Adjust day options based on leap year
        const isLeap = isLeapYear(parseInt(yearSelect.value));
        adjustDayOptions(daySelect, isLeap, parseInt(monthSelect.value), parseInt(yearSelect.value));
    });

    // Event listener for changes in the "at-month" select
    document.getElementById('at-month').addEventListener('change', function () {
        const yearSelect = document.getElementById('at-year');
        const monthSelect = this;
        const daySelect = document.getElementById('at-day');

        populateDays(yearSelect, monthSelect, daySelect);

        // Adjust day options based on leap year
        const isLeap = isLeapYear(parseInt(yearSelect.value));
        adjustDayOptions(daySelect, isLeap, parseInt(monthSelect.value), parseInt(yearSelect.value));
    });

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

    // Event listener for the "Calculate" button
    document.getElementById('calculate').addEventListener('click', calculateAge);

    // Function to handle the form reset
    function handleReset() {
        // Reset input field values
        document.getElementById('dob-year').value = '';
        document.getElementById('dob-month').value = '1';
        document.getElementById('dob-day').options.length = 0; // Clear day options

        document.getElementById('at-year').value = '';
        document.getElementById('at-month').value = '1';
        document.getElementById('at-day').options.length = 0; // Clear day options

        // Clear the age output
        document.getElementById('age-output').innerText = '';
    }

    // Event listener for the "Reset" button
    document.getElementById('reset').addEventListener('click', handleReset);
</script>

@endsection

