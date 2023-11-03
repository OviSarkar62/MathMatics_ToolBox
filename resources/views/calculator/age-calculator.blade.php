@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Age Calculator</h5>
                    <form id="age-calculator-form">
                        <div class="mb-3">
                            <label for="use-datepicker" class="form-check-label">Use Date Picker</label>
                            <input type="checkbox" id="use-datepicker" class="form-check-input">
                        </div>
                        <div class="row mb-3">
                            <!-- DOB Fields (Year, Month, Day) -->
                            <div class="col-md-4">
                                <label for="dob-year" class="form-label">Year of Birth:</label>
                                <input type="number" name="dob-year" id="dob-year" class="form-control" placeholder="Year" min="1800" max="2500">
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
                                <input type="number" name="at-year" id="at-year" class="form-control" placeholder="Year" min="1800" max="2500">
                            </div>
                            <div class="col-md-4">
                                <label for="at-month" class "form-label">Month at the Age of:</label>
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
                            <button type="button" id="reset" class="btn btn-danger">Reset</button>
                            <button type="button" id="calculate" class="btn btn-success">Calculate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Function to populate day options based on the selected year and month
    function populateDays(selectYear, selectMonth, selectDay) {
        const selectedYear = selectYear.value;
        const selectedMonth = selectMonth.value;
        const daysSelect = selectDay;

        // Clear existing options
        daysSelect.innerHTML = '';

        if (selectedYear && selectedMonth) {
            const daysInMonth = new Date(selectedYear, selectedMonth, 0).getDate();
            for (let day = 1; day <= daysInMonth; day++) {
                const option = document.createElement('option');
                option.value = day;
                option.textContent = day;
                daysSelect.appendChild(option);
            }
        }
    }

    // Calculate age
    function calculateAge() {
        const dobYear = parseInt(document.getElementById('dob-year').value);
        const dobMonth = parseInt(document.getElementById('dob-month').value);
        const dobDay = parseInt(document.getElementById('dob-day').value);
        const atYear = parseInt(document.getElementById('at-year').value);
        const atMonth = parseInt(document.getElementById('at-month').value);
        const atDay = parseInt(document.getElementById('at-day').value);

        const dobDate = new Date(dobYear, dobMonth - 1, dobDay);
        const atDate = new Date(atYear, atMonth - 1, atDay);

        const ageInMillis = atDate - dobDate;
        const ageInYears = atYear - dobYear;
        const ageInMonths = atMonth - dobMonth;
        const ageInDays = atDay - dobDay;

        // Adjust for negative age values
        if (ageInDays < 0) {
            ageInMonths--;
            ageInDays += new Date(atYear, atMonth, 0).getDate();
        }
        if (ageInMonths < 0) {
            ageInYears--;
            ageInMonths += 12;
        }

        const ageOutput = document.getElementById('age-output');
        ageOutput.textContent = `${ageInYears} years ${ageInMonths} months ${ageInDays} days`;
    }

    // Function to reset the form
    function resetForm() {
        document.getElementById('age-calculator-form').reset();
        document.getElementById('age-output').textContent = 'Age will be displayed here.';
    }

    // Event listeners
    document.getElementById('dob-year').addEventListener('change', () => {
        populateDays(document.getElementById('dob-year'), document.getElementById('dob-month'), document.getElementById('dob-day'));
    });

    document.getElementById('dob-month').addEventListener('change', () => {
        populateDays(document.getElementById('dob-year'), document.getElementById('dob-month'), document.getElementById('dob-day'));
    });

    document.getElementById('at-year').addEventListener('change', () => {
        populateDays(document.getElementById('at-year'), document.getElementById('at-month'), document.getElementById('at-day'));
    });

    document.getElementById('at-month').addEventListener('change', () => {
        populateDays(document.getElementById('at-year'), document.getElementById('at-month'), document.getElementById('at-day'));
    });

    document.getElementById('calculate').addEventListener('click', () => {
        calculateAge();
    });

    document.getElementById('reset').addEventListener('click', () => {
        resetForm();
    });

    document.getElementById('use-datepicker').addEventListener('change', () => {
        const useDatePicker = document.getElementById('use-datepicker').checked;
        const dobFields = document.querySelectorAll('#dob-year, #dob-month, #dob-day');
        const atFields = document.querySelectorAll('#at-year, #at-month, #at-day');
        const dobDatepicker = document.createElement('input');
        const atDatepicker = document.createElement('input');

        dobFields.forEach((field) => (field.disabled = useDatePicker));
        atFields.forEach((field) => (field.disabled = useDatePicker));

        dobDatepicker.type = 'date';
        atDatepicker.type = 'date';
        dobDatepicker.id = 'dob-datepicker';
        atDatepicker.id = 'at-datepicker';

        dobFields[0].parentNode.appendChild(dobDatepicker);
        atFields[0].parentNode.appendChild(atDatepicker);
    });

</script>

@endsection



{{-- <div class="mb-3">
    <label for="birth-month" class="form-label">Month of Birth:</label>
    <select name="birth-month" id="birth-month" class="form-select">
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
</div> --}}
