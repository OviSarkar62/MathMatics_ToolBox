@extends('layouts.app')
<style>
    body {
    /* Left bottom corner SVG */
    background-image: url('/assets/img/grade1.svg');
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

    .input-row {
        margin-bottom: 10px;
    }

    .input-group {
        display: flex;
        align-items: center;
    }

    .input-group input,
    .input-group select {
        flex: 1;
        margin-right: 5px;
    }

    .input-group button {
        flex-shrink: 0;
    }

    #result {
        margin-top: 20px;
    }

    #gpa-result {
        margin-top: 10px;
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

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <h5>GPA Calculator</h5>
                    <form id="gpa-form">
                        <div id="input-container">
                            <!-- Initial input row -->
                            <div class="row mb-3 input-row">
                                <div class="col-md-3">
                                    <input type="text" name="courses[]" class="form-control mb-2" placeholder="Course">
                                </div>
                                <div class="col-md-3">
                                    <select name="grades[]" class="form-control mb-2">
                                        <!-- Options for grades -->
                                        <option value="4">A+</option>
                                        <option value="3.75">A</option>
                                        <option value="3.5">A-</option>
                                        <option value="3.25">B+</option>
                                        <option value="3">B</option>
                                        <option value="2.75">B-</option>
                                        <option value="2.5">C+</option>
                                        <option value="2.25">C</option>
                                        <option value="2">C-</option>
                                        <option value="1">D</option>
                                        <option value="0">F</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select name="credits[]" class="form-control mb-2">
                                        <!-- Options for credits -->
                                        @for ($i = 0; $i <= 6; $i += 0.25)
                                            <option value="{{ number_format($i, 2) }}">{{ number_format($i, 2) }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary add-input mb-2">Add</button>
                                    <button type="button" class="btn btn-danger delete-input mb-2">Delete</button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-danger reset-form">Reset</button>
                        <button type="button" class="btn btn-success calculate-gpa">Calculate GPA</button>
                    </form>
                    <hr>
                    <div id="result" class="mt-3">
                        <strong>GPA Result:</strong>
                        <div id="gpa-result"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        // Add input field dynamically
        $("#input-container").on("click", ".add-input", addInputRow);

        // Delete input field
        $("#input-container").on("click", ".delete-input", deleteInputRow);

        // Calculate GPA
        $(".calculate-gpa").on("click", function () {
            var gpaResult = calculateGPA();
            $("#gpa-result").text("GPA: " + gpaResult.toFixed(2));
        });

        function addInputRow() {
            var newRow = $("#input-container .input-row:first").clone();
            newRow.find("input").val("");
            newRow.find("select").prop("selectedIndex", 0);
            $("#input-container").append(newRow);

            // Toggle visibility of buttons based on row count
            toggleButtons();
        }

        function deleteInputRow() {
            if ($("#input-container .input-row").length > 1) {
                $(this).closest(".input-row").remove();
            }

            // Toggle visibility of buttons based on row count
            toggleButtons();
        }

        function toggleButtons() {
            var rows = $("#input-container .input-row");

            // Hide Add button in all rows
            rows.find(".add-input").hide();

            // Show Delete button in all rows except the first one
            rows.find(".delete-input").hide();
            rows.not(":first").find(".delete-input").show();

            // Show Add button in the last row
            rows.last().find(".add-input").show();
        }

        function calculateGPA() {
            var totalCredits = 0;
            var weightedSum = 0;

            $("#gpa-form .input-row").each(function () {
                var grade = parseFloat($(this).find("select[name='grades[]']").val());
                var credits = parseFloat($(this).find("select[name='credits[]']").val());

                if (!isNaN(grade) && !isNaN(credits)) {
                    weightedSum += grade * credits;
                    totalCredits += credits;
                }
            });

            if (totalCredits === 0) {
                return 0; // Avoid division by zero
            }

            var gpa = weightedSum / totalCredits;
            return gpa;
        }
        // Reset form
        $(".reset-form").on("click", function () {
            $("#input-container .input-row").find("input, select").val("");
            $("#gpa-result").empty();
        });
    });
</script>



@endsection
