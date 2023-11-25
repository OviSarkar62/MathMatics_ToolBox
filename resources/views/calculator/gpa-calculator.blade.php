@extends('layouts.app')
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa; /* Light background color */
    }

    .container {
        max-width: 800px;
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

    /* Responsive adjustments */
    @media (max-width: 767px) {
        .card {
            margin-top: 20px;
        }
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
</style>

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
        $("#input-container").on("click", ".add-input", function () {
            var newRow = $("#input-container .input-row:first").clone();
            newRow.find("input").val("");
            newRow.find("select").prop("selectedIndex", 0);
            $("#input-container").append(newRow);
        });

        // Delete input field
        $("#input-container").on("click", ".delete-input", function () {
            if ($("#input-container .input-row").length > 1) {
                $(this).closest(".input-row").remove();
            }
        });

        // Calculate GPA
        $(".calculate-gpa").on("click", function () {
            var gpaResult = calculateGPA();
            $("#gpa-result").text("GPA: " + gpaResult.toFixed(2));
        });

        // Function to calculate GPA
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
    });
</script>
@endsection
