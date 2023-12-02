@extends('layouts.app')
<style>
/* Add this style to your existing CSS file or create a new one */

.container {
    max-width: 1200px;
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

@media (max-width: 767px) {
    .col-md-4 {
        flex: 0 0 100%;
        max-width: 100%;
    }
}

</style>
@section('content')
    <div class="container mt-5">
        <div class="row">
            <!-- Degree-Radian-Gradian Converter -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Degree Converter</h5>
                        <div class="mb-3">
                            <label for="angle-degrees" class="form-label">Degrees:</label>
                            <input type="number" id="angle-degrees" class="form-control" placeholder="Degrees">
                        </div>
                        <button onclick="convertDegrees('radian')" class="btn btn-success">Convert to Radians</button>
                        <button onclick="convertDegrees('gradian')" class="btn btn-success">Convert to Gradians</button>
                        <button onclick="resetDegrees()" class="btn btn-danger">Reset</button>
                        <p id="converted-result-degrees" class="mt-2"></p>
                    </div>
                </div>
            </div>

            <!-- Radian Converter -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Radian Converter</h5>
                        <div class="mb-3">
                            <label for="angle-radians" class="form-label">Radians:</label>
                            <input type="number" id="angle-radians" class="form-control" placeholder="Radians">
                        </div>
                        <button onclick="convertRadians('degree')" class="btn btn-success">Convert to Degrees</button>
                        <button onclick="convertRadians('gradian')" class="btn btn-success">Convert to Gradians</button>
                        <button onclick="resetRadians()" class="btn btn-danger">Reset</button>
                        <p id="converted-result-radians" class="mt-2"></p>
                    </div>
                </div>
            </div>

            <!-- Gradian Converter -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gradian Converter</h5>
                        <div class="mb-3">
                            <label for="angle-gradians" class="form-label">Gradians:</label>
                            <input type="number" id="angle-gradians" class="form-control" placeholder="Gradians">
                        </div>
                        <button onclick="convertGradians('degree')" class="btn btn-success">Convert to Degrees</button>
                        <button onclick="convertGradians('radian')" class="btn btn-success">Convert to Radians</button>
                        <button onclick="resetGradians()" class="btn btn-danger">Reset</button>
                        <p id="converted-result-gradians" class="mt-2"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function convertDegrees(targetUnit) {
            // Get the input value
            var degrees = parseFloat(document.getElementById('angle-degrees').value);

            // Convert degrees to radians
            if (targetUnit === 'radian') {
                var radians = degrees * (Math.PI / 180);
                document.getElementById('converted-result-degrees').innerHTML = "Radians: " + radians.toFixed(4);
            }

            // Convert degrees to gradians
            else if (targetUnit === 'gradian') {
                var gradians = degrees * (10 / 9);
                document.getElementById('converted-result-degrees').innerHTML = "Gradians: " + gradians.toFixed(4);
            }
        }


        function convertRadians(targetUnit) {
            // Get the input value
            var radians = parseFloat(document.getElementById('angle-radians').value);

            // Convert radians to degrees
            if (targetUnit === 'degree') {
            var degrees = radians * (180 / Math.PI);
            document.getElementById('converted-result-radians').innerHTML = "Degrees: " + degrees.toFixed(4);
            }
            // Convert radians to gradians
            else if (targetUnit === 'gradian') {
            var gradians = radians * (200 / Math.PI);
            document.getElementById('converted-result-radians').innerHTML = "Gradians: " + gradians.toFixed(4);
            }
        }


        function convertGradians(targetUnit) {
            // Get the input value
            var gradians = parseFloat(document.getElementById('angle-gradians').value);

            // Convert gradians to degrees
            if (targetUnit === 'degree') {
                var degrees = gradians * (9 / 10);
                document.getElementById('converted-result-gradians').innerHTML = "Degrees: " + degrees.toFixed(4);
            }

            // Convert gradians to radians
            else if (targetUnit === 'radian') {
                var radians = gradians * (Math.PI / 200);
                document.getElementById('converted-result-gradians').innerHTML = "Radians: " + radians.toFixed(4);
            }
        }

        function resetDegrees() {
            // Reset input field and output
            document.getElementById('angle-degrees').value = '';
            document.getElementById('converted-result-degrees').innerHTML = '';
        }

        function resetRadians() {
            // Reset input field and output
            document.getElementById('angle-radians').value = '';
            document.getElementById('converted-result-radians').innerHTML = '';
        }

        function resetGradians() {
            // Reset input field and output
            document.getElementById('angle-gradians').value = '';
            document.getElementById('converted-result-gradians').innerHTML = '';
        }
    </script>
@endsection
