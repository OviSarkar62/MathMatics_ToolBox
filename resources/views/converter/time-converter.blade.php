@extends('layouts.app')
<style>
    body {
    /* Left bottom corner SVG */
    background-image: url('/assets/img/time2.svg');
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
                    <h5>Time Converter</h5>
                    <form id="time-converter-form">
                        <div class="row mb-3">
                            <!-- Starting Time Fields -->
                            <div class="col-md-4">
                                <label for="start-day" class="form-label">Starting Day:</label>
                                <input type="number" id="start-day" class="form-control" placeholder="Day" min="0">
                            </div>
                            <div class="col-md-4">
                                <label for="start-hour" class="form-label">Hour:</label>
                                <input type="number" id="start-hour" class="form-control" placeholder="Hour" min="0" max="23">
                            </div>
                            <div class="col-md-4">
                                <label for="start-minute" class="form-label">Minute:</label>
                                <input type="number" id="start-minute" class="form-control" placeholder="Minute" min="0" max="59">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <!-- Ending Time Fields -->
                            <div class="col-md-4">
                                <label for="end-day" class="form-label">Ending Day:</label>
                                <input type="number" id="end-day" class="form-control" placeholder="Day" min="0">
                            </div>
                            <div class="col-md-4">
                                <label for="end-hour" class="form-label">Hour:</label>
                                <input type="number" id="end-hour" class="form-control" placeholder="Hour" min="0" max="23">
                            </div>
                            <div class="col-md-4">
                                <label for="end-minute" class="form-label">Minute:</label>
                                <input type="number" id="end-minute" class="form-control" placeholder="Minute" min="0" max="59">
                            </div>
                        </div>

                        <div class="mb-3">
                            <!-- Time Unit Selector -->
                            <label for="time-unit" class="form-label">Select Time Unit:</label>
                            <select id="time-unit" class="form-select">
                                <option value="day-hour-minute">Day-Hour-Minute</option>
                                <option value="hour-minute">Hour-Minute</option>
                                <option value="minute">Minute</option>
                            </select>
                        </div>

                        <button type="button" onclick="resetForm()" class="btn btn-danger">Reset</button>
                        <button type="button" onclick="convertTime()" class="btn btn-success">Convert</button>

                        <div class="mb-3" style="display:none;" id="resultSection">
                            <br>
                            <label for="converted-time" class="form-label">Converted Time:</label>
                            <span id="converted-time-display"></span>
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
            document.getElementById("time-converter-form").reset();
            document.getElementById("converted-time-display").textContent = "";
            // Hide the result section
            document.getElementById("resultSection").style.display = 'none';
        };

        // Function to convert time
        window.convertTime = function () {
            // Get values from form
            var startDay = parseInt(document.getElementById("start-day").value) || 0;
            var startHour = parseInt(document.getElementById("start-hour").value) || 0;
            var startMinute = parseInt(document.getElementById("start-minute").value) || 0;

            var endDay = parseInt(document.getElementById("end-day").value) || 0;
            var endHour = parseInt(document.getElementById("end-hour").value) || 0;
            var endMinute = parseInt(document.getElementById("end-minute").value) || 0;

            var timeUnit = document.getElementById("time-unit").value;

            console.log("Start Time:", startDay, "days", startHour, "hours", startMinute, "minutes");
            console.log("End Time:", endDay, "days", endHour, "hours", endMinute, "minutes");
            console.log("Time Unit:", timeUnit);

            // Calculate the time difference based on the selected time unit
            var convertedTime;
            if (timeUnit === "day-hour-minute") {
                convertedTime = calculateDayHourMinute(startDay, startHour, startMinute, endDay, endHour, endMinute);
            } else if (timeUnit === "hour-minute") {
                convertedTime = calculateHourMinute(startDay, startHour, startMinute, endDay, endHour, endMinute);
            } else if (timeUnit === "minute") {
                convertedTime = calculateMinute(startDay, startHour, startMinute, endDay, endHour, endMinute);
            }

            console.log("Converted Time:", convertedTime);

            // Display converted time
            var convertedTimeDisplay = document.getElementById("converted-time-display");
            convertedTimeDisplay.textContent = convertedTime;

            // Show the result section
            document.getElementById("resultSection").style.display = 'block';
        };

        // Function to calculate time in (day, hour, minute) format
        function calculateDayHourMinute(startDay, startHour, startMinute, endDay, endHour, endMinute) {
            var totalMinutes = (endDay * 24 * 60 + endHour * 60 + endMinute) - (startDay * 24 * 60 + startHour * 60 + startMinute);
            var days = Math.floor(totalMinutes / (24 * 60));
            var remainingMinutes = totalMinutes % (24 * 60);
            var hours = Math.floor(remainingMinutes / 60);
            var minutes = remainingMinutes % 60;

            return days + " days, " + hours + " hours, " + minutes + " minutes";
        }

        // Function to calculate time in (hour, minute) format
        function calculateHourMinute(startDay, startHour, startMinute, endDay, endHour, endMinute) {
            var totalMinutes = (endDay * 24 * 60 + endHour * 60 + endMinute) - (startDay * 24 * 60 + startHour * 60 + startMinute);
            var hours = Math.floor(totalMinutes / 60);
            var minutes = totalMinutes % 60;

            return hours + " hours, " + minutes + " minutes";
        }

        // Function to calculate time in (minute) format
        function calculateMinute(startDay, startHour, startMinute, endDay, endHour, endMinute) {
            var totalMinutes = (endDay * 24 * 60 + endHour * 60 + endMinute) - (startDay * 24 * 60 + startHour * 60 + startMinute);

            return totalMinutes + " minutes";
        }
    });
    </script>
@endsection


