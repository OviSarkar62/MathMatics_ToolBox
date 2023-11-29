@extends('layouts.app')
<style>

/* Add this style to your existing CSS file or create a new one */

body {
    font-family: 'Arial', sans-serif;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
}

.row {
    display: flex;
}

.card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease;
    flex: 1; /* Make each card take up equal width */
    margin-right: 15px; /* Adjust margin for spacing between cards */
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

@media (max-width: 767px) {
    .col-md-4 {
        flex: 0 0 100%;
        max-width: 100%;
        margin-right: 0; /* Remove margin for small screens */
    }
}

</style>
@section('content')
    <div class="container mt-5">
        <div class="row">
            <!-- Rectangle Card -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Rectangle Area Calculator</h5>
                        <div class="mb-3">
                            <label for="rectangle-length" class="form-label">Length:</label>
                            <input type="number" id="rectangle-length" class="form-control" placeholder="Length">
                        </div>
                        <div class="mb-3">
                            <label for="rectangle-width" class="form-label">Width:</label>
                            <input type="number" id="rectangle-width" class="form-control" placeholder="Width">
                        </div>
                        <button onclick="resetForm('rectangle')" class="btn btn-danger">Reset</button>
                        <button onclick="calculateArea('rectangle')" class="btn btn-success">Calculate</button>
                        <p id="rectangle-area" class="mt-2"></p>
                    </div>
                </div>
            </div>

            <!-- Triangle Card -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Triangle Area Calculator</h5>
                        <div class="mb-3">
                            <label for="triangle-base" class="form-label">Base:</label>
                            <input type="number" id="triangle-base" class="form-control" placeholder="Base">
                        </div>
                        <div class="mb-3">
                            <label for="triangle-height" class="form-label">Height:</label>
                            <input type="number" id="triangle-height" class="form-control" placeholder="Height">
                        </div>
                        <button onclick="resetForm('triangle')" class="btn btn-danger">Reset</button>
                        <button onclick="calculateArea('triangle')" class="btn btn-success">Calculate</button>
                        <p id="triangle-area" class="mt-2"></p>
                    </div>
                </div>
            </div>

            <!-- Trapezoid Card -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Trapezoid Area Calculator</h5>
                        <div class="mb-3">
                            <label for="trapezoid-base1" class="form-label">Base 1:</label>
                            <input type="number" id="trapezoid-base1" class="form-control" placeholder="Base 1">
                        </div>
                        <div class="mb-3">
                            <label for="trapezoid-base2" class="form-label">Base 2:</label>
                            <input type="number" id="trapezoid-base2" class="form-control" placeholder="Base 2">
                        </div>
                        <div class="mb-3">
                            <label for="trapezoid-height" class="form-label">Height:</label>
                            <input type="number" id="trapezoid-height" class="form-control" placeholder="Height">
                        </div>
                        <button onclick="resetForm('trapezoid')" class="btn btn-danger">Reset</button>
                        <button onclick="calculateArea('trapezoid')" class="btn btn-success">Calculate</button>
                        <p id="trapezoid-area" class="mt-2"></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Circle Card -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Circle Area Calculator</h5>
                        <div class="mb-3">
                            <label for="circle-radius" class="form-label">Radius:</label>
                            <input type="number" id="circle-radius" class="form-control" placeholder="Radius">
                        </div>
                        <button onclick="resetForm('circle')" class="btn btn-danger">Reset</button>
                        <button onclick="calculateArea('circle')" class="btn btn-success">Calculate</button>
                        <p id="circle-area" class="mt-2"></p>
                    </div>
                </div>
            </div>

            <!-- Ellipse Card -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ellipse Area Calculator</h5>
                        <div class="mb-3">
                            <label for="ellipse-major-axis" class="form-label">Major Axis:</label>
                            <input type="number" id="ellipse-major-axis" class="form-control" placeholder="Major Axis">
                        </div>
                        <div class="mb-3">
                            <label for="ellipse-minor-axis" class="form-label">Minor Axis:</label>
                            <input type="number" id="ellipse-minor-axis" class="form-control" placeholder="Minor Axis">
                        </div>
                        <button onclick="resetForm('ellipse')" class="btn btn-danger">Reset</button>
                        <button onclick="calculateArea('ellipse')" class="btn btn-success">Calculate</button>
                        <p id="ellipse-area" class="mt-2"></p>
                    </div>
                </div>
            </div>

            <!-- Parallelogram Card -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Parallelogram Area Calculator</h5>
                        <div class="mb-3">
                            <label for="parallelogram-base" class="form-label">Base:</label>
                            <input type="number" id="parallelogram-base" class="form-control" placeholder="Base">
                        </div>
                        <div class="mb-3">
                            <label for="parallelogram-height" class="form-label">Height:</label>
                            <input type="number" id="parallelogram-height" class="form-control" placeholder="Height">
                        </div>
                        <button onclick="resetForm('parallelogram')" class="btn btn-danger">Reset</button>
                        <button onclick="calculateArea('parallelogram')" class="btn btn-success">Calculate</button>
                        <p id="parallelogram-area" class="mt-2"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function calculateArea(shape) {
            let area;
            switch (shape) {
                case 'rectangle':
                    const rectangleLength = document.getElementById('rectangle-length').value;
                    const rectangleWidth = document.getElementById('rectangle-width').value;
                    area = rectangleLength * rectangleWidth;
                    break;
                case 'triangle':
                    const triangleBase = document.getElementById('triangle-base').value;
                    const triangleHeight = document.getElementById('triangle-height').value;
                    area = (triangleBase * triangleHeight) / 2;
                    break;
                case 'trapezoid':
                    const trapezoidBase1 = document.getElementById('trapezoid-base1').value;
                    const trapezoidBase2 = document.getElementById('trapezoid-base2').value;
                    const trapezoidHeight = document.getElementById('trapezoid-height').value;
                    area = ((parseFloat(trapezoidBase1) + parseFloat(trapezoidBase2)) / 2) * trapezoidHeight;
                    break;
                case 'circle':
                    const circleRadius = document.getElementById('circle-radius').value;
                    area = Math.PI * circleRadius * circleRadius;
                    break;
                case 'ellipse':
                    const ellipseMajorAxis = document.getElementById('ellipse-major-axis').value;
                    const ellipseMinorAxis = document.getElementById('ellipse-minor-axis').value;
                    area = Math.PI * ellipseMajorAxis * ellipseMinorAxis;
                    break;
                case 'parallelogram':
                    const parallelogramBase = document.getElementById('parallelogram-base').value;
                    const parallelogramHeight = document.getElementById('parallelogram-height').value;
                    area = parallelogramBase * parallelogramHeight;
                    break;
                default:
                    area = 0;
                    break;
            }

            // Set the calculated area or error message
            if (!isNaN(area) && area > 0) {
                document.getElementById(`${shape}-area`).textContent = `Area: ${area.toFixed(2)}`;
            } else {
                document.getElementById(`${shape}-area`).textContent = 'Please enter valid numbers.';
            }
        }

        function resetForm(shape) {
            // Select and reset input fields for the given shape
            const inputs = document.querySelectorAll(
                `#${shape}-length, #${shape}-width, #${shape}-base, #${shape}-height, #${shape}-radius, #${shape}-major-axis, #${shape}-minor-axis, #${shape}-base1, #${shape}-base2`
                );
            inputs.forEach(input => {
                input.value = '';
            });

            // Clear the area result display
            const outputArea = document.getElementById(`${shape}-area`);
            if (outputArea) {
                outputArea.textContent = '';
            }
        }
    </script>
@endsection
