@extends('layouts.app')
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

    #result {
        margin-top: 20px;
        font-weight: bold;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Time Zone Converter</h5>
                    <form id="time-zone-converter-form">
                        <div class="mb-3">
                            <label for="originalTimeZone" class="form-label">Original Time Zone:</label>
                            <select id="originalTimeZone" class="form-select">
                                <!-- SAARC countries as time zones -->
                                <option value="Asia/Kabul">Afghanistan (AFT)</option>
                                <option value="Asia/Dhaka">Bangladesh (BST)</option>
                                <option value="Asia/Thimphu">Bhutan (BTT)</option>
                                <option value="Asia/Kolkata">India (IST)</option>
                                <option value="Asia/Katmandu">Nepal (NPT)</option>
                                <option value="Asia/Colombo">Sri Lanka (SLT)</option>
                                <!-- Add more SAARC countries as needed -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="originalTime" class="form-label">Original Time:</label>
                            <input type="text" id="originalTime" class="form-control" placeholder="Select time" data-input>
                        </div>
                        <div class="mb-3">
                            <label for="convertedTimeZone" class="form-label">Converted Time Zone:</label>
                            <select id="convertedTimeZone" class="form-select">
                                <!-- SAARC countries as time zones -->
                                <option value="Asia/Kabul">Afghanistan (AFT)</option>
                                <option value="Asia/Dhaka">Bangladesh (BST)</option>
                                <option value="Asia/Thimphu">Bhutan (BTT)</option>
                                <option value="Asia/Kolkata">India (IST)</option>
                                <option value="Asia/Katmandu">Nepal (NPT)</option>
                                <option value="Asia/Colombo">Sri Lanka (SLT)</option>
                                <!-- Add more SAARC countries as needed -->
                            </select>
                        </div>
                        <button type="button" onclick="resetForm()" class="btn btn-danger">Reset</button>
                        <button type="button" onclick="convertTime()" class="btn btn-success">Convert</button>
                        <div class="mb-3">
                            <label for="convertedTime" class="form-label">Converted Time:</label>
                            <span id="convertedTimeDisplay"> </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<!-- Include Flatpickr plugin for time input -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/timePlugin.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Initialize Flatpickr for time input fields
        flatpickr("#originalTime", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });

        // Function to reset the form
        window.resetForm = function () {
            document.getElementById("time-zone-converter-form").reset();
            document.getElementById("convertedTimeDisplay").textContent = "";
        };

        // Function to convert time
        window.convertTime = function () {
            // Get values from form
            var originalTimeZone = document.getElementById("originalTimeZone").value;
            var originalTime = document.getElementById("originalTime").value;
            var convertedTimeZone = document.getElementById("convertedTimeZone").value;

            console.log("Original Time Zone:", originalTimeZone);
            console.log("Original Time:", originalTime);
            console.log("Converted Time Zone:", convertedTimeZone);

            // Parse the original time string
            var [hours, minutes] = originalTime.split(':').map(Number);

            // Convert time using JavaScript Date object
            var originalDate = new Date();
            originalDate.setHours(hours);
            originalDate.setMinutes(minutes);

            // Display converted time
            var convertedDate = new Date(originalDate.toLocaleString("en-US", { timeZone: convertedTimeZone }));

            console.log("Converted Date:", convertedDate);

            // Display converted time
            var convertedTimeElement = document.getElementById("convertedTimeDisplay");
            convertedTimeElement.textContent = "Converted Time: " + convertedDate.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        };
    });
</script>
@endsection
