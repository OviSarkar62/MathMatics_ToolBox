@extends('layouts.app')
<style>

    /* Add this style to your existing CSS file or create a new one */
    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .row {
        display: flex;
    }

    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);
        transition: box-shadow 0.3s ease;
        flex: 1; /* Make each card take up equal width */
        margin-right: 15px; /* Adjust margin for spacing between cards */
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

    @media (max-width: 767px) {
    .col-md-4 {
        flex: 0 0 100%;
        max-width: 100%;
        margin-right: 0; /* Remove margin for small screens */
        margin-left: 0; /* Remove left margin for small screens */
    }

    .row {
        flex-direction: column; /* Change to a column layout for small screens */
        align-items: center; /* Center the cards horizontally */
    }

    .card {
        margin-right: 0; /* Remove right margin for small screens */
        margin-bottom: 15px; /* Add bottom margin for spacing between cards */
    }
}

    </style>
@section('content')
    <div class="container mt-5">
        <div class="row">
            <!-- Cylinder Card -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cylinder Volume Calculator</h5>
                        <div class="mb-3">
                            <label for="cylinder-radius" class="form-label">Radius:</label>
                            <input type="number" id="cylinder-radius" class="form-control" placeholder="Radius">
                        </div>
                        <div class="mb-3">
                            <label for="cylinder-height" class="form-label">Height:</label>
                            <input type="number" id="cylinder-height" class="form-control" placeholder="Height">
                        </div>
                        <button onclick="resetForm('cylinder')" class="btn btn-danger">Reset</button>
                        <button onclick="calculateVolume('cylinder')" class="btn btn-success">Calculate</button>
                        <p id="cylinder-volume" class="mt-2"></p>
                    </div>
                </div>
            </div>

            <!-- Cone Card -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cone Volume Calculator</h5>
                        <div class="mb-3">
                            <label for="cone-radius" class="form-label">Radius:</label>
                            <input type="number" id="cone-radius" class="form-control" placeholder="Radius">
                        </div>
                        <div class="mb-3">
                            <label for="cone-height" class="form-label">Height:</label>
                            <input type="number" id="cone-height" class="form-control" placeholder="Height">
                        </div>
                        <button onclick="resetForm('cone')" class="btn btn-danger">Reset</button>
                        <button onclick="calculateVolume('cone')" class="btn btn-success">Calculate</button>
                        <p id="cone-volume" class="mt-2"></p>
                    </div>
                </div>
            </div>

            <!-- Capsule Card -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Capsule Volume Calculator</h5>
                        <div class="mb-3">
                            <label for="capsule-radius" class="form-label">Radius:</label>
                            <input type="number" id="capsule-radius" class="form-control" placeholder="Radius">
                        </div>
                        <div class="mb-3">
                            <label for="capsule-height" class="form-label">Height:</label>
                            <input type="number" id="capsule-height" class="form-control" placeholder="Height">
                        </div>
                        <button onclick="resetForm('capsule')" class="btn btn-danger">Reset</button>
                        <button onclick="calculateVolume('capsule')" class="btn btn-success">Calculate</button>
                        <p id="capsule-volume" class="mt-2"></p>
                    </div>
                </div>
            </div>


            <!-- Sphere Card -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sphere Volume Calculator</h5>
                        <div class="mb-3">
                            <label for="circle-radius" class="form-label">Pi</label>
                            <input type="number" disabled id="circle-radius" class="form-control" placeholder="3.14159...">
                        </div>
                        <div class="mb-3">
                            <label for="sphere-radius" class="form-label">Radius:</label>
                            <input type="number" id="sphere-radius" class="form-control" placeholder="Radius">
                        </div>
                        <button onclick="resetForm('sphere')" class="btn btn-danger">Reset</button>
                        <button onclick="calculateVolume('sphere')" class="btn btn-success">Calculate</button>
                        <p id="sphere-volume" class="mt-2"></p>
                    </div>
                </div>
            </div>

            <!-- Cube Card -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cube Volume Calculator</h5>
                        <div class="mb-3">
                            <label for="cube-side1" class="form-label">Side Length 1:</label>
                            <input type="number" id="cube-side1" class="form-control" placeholder="Side Length" oninput="updateDisabledInputs('cube-side1')">
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-6">
                                <label for="cube-side2" class="form-label">Side Length 2:</label>
                                <input type="number" disabled id="cube-side2" class="form-control" placeholder="Side Length">
                            </div>
                            <div class="col-sm-6">
                                <label for="cube-side3" class="form-label">Side Length 3:</label>
                                <input type="number" disabled id="cube-side3" class="form-control" placeholder="Side Length">
                            </div>
                        </div>
                        <button onclick="resetForm('cube')" class="btn btn-danger">Reset</button>
                        <button onclick="calculateVolume('cube')" class="btn btn-success">Calculate</button>
                        <p id="cube-volume" class="mt-2"></p>
                    </div>
                </div>
            </div>

            <!-- Tube Card -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tube Volume Calculator</h5>
                        <div class="mb-3 row">
                        <div class="col-sm-6">
                            <label for="tube-outer-radius" class="form-label">Outer Radius:</label>
                            <input type="number" id="tube-outer-radius" class="form-control" placeholder="Outer Radius">
                        </div>
                        <div class="col-sm-6">
                            <label for="tube-inner-radius" class="form-label">Inner Radius:</label>
                            <input type="number" id="tube-inner-radius" class="form-control" placeholder="Inner Radius">
                        </div>
                        </div>
                        <div class="mb-3">
                            <label for="tube-height" class="form-label">Height:</label>
                            <input type="number" id="tube-height" class="form-control" placeholder="Height">
                        </div>
                        <button onclick="resetForm('tube')" class="btn btn-danger">Reset</button>
                        <button onclick="calculateVolume('tube')" class="btn btn-success">Calculate</button>
                        <p id="tube-volume" class="mt-2"></p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        function calculateVolume(shape) {
            let volume;
            switch (shape) {
                case 'sphere':
                    const sphereRadius = document.getElementById('sphere-radius').value;
                    volume = (4 / 3) * Math.PI * Math.pow(sphereRadius, 3);
                    break;
                case 'cone':
                    const coneRadius = document.getElementById('cone-radius').value;
                    const coneHeight = document.getElementById('cone-height').value;
                    volume = (1 / 3) * Math.PI * Math.pow(coneRadius, 2) * coneHeight;
                    break;
                case 'cylinder':
                    const cylinderRadius = document.getElementById('cylinder-radius').value;
                    const cylinderHeight = document.getElementById('cylinder-height').value;
                    volume = Math.PI * Math.pow(cylinderRadius, 2) * cylinderHeight;
                    break;
                case 'capsule':
                    const capsuleRadius = document.getElementById('capsule-radius').value;
                    const capsuleHeight = document.getElementById('capsule-height').value;
                    volume = (4 / 3) * Math.PI * Math.pow(capsuleRadius, 3) + Math.PI * Math.pow(capsuleRadius, 2) * capsuleHeight;
                    break;
                case 'tube':
                    const tubeOuterRadius = document.getElementById('tube-outer-radius').value;
                    const tubeInnerRadius = document.getElementById('tube-inner-radius').value;
                    const tubeHeight = document.getElementById('tube-height').value;
                    volume = Math.PI * ((Math.pow(tubeOuterRadius, 2) - Math.pow(tubeInnerRadius, 2)) / 4) * tubeHeight;
                    break;
                default:
                    volume = 0;
                    break;
            }

            // Set the calculated volume or error message
            if (!isNaN(volume) && volume > 0) {
                document.getElementById(`${shape}-volume`).textContent = `Volume: ${volume.toFixed(2)}`;
            } else {
                document.getElementById(`${shape}-volume`).textContent = 'Please enter valid numbers.';
            }
        }

        function resetForm(shape) {
            // Select and reset input fields for the given shape
            const inputs = document.querySelectorAll(`#${shape}-radius, #${shape}-height, #${shape}-side, #${shape}-outer-radius, #${shape}-inner-radius`);
            inputs.forEach(input => {
                input.value = '';
            });

            // Clear the volume result display
            const outputVolume = document.getElementById(`${shape}-volume`);
            if (outputVolume) {
                outputVolume.textContent = '';
            }
        }
    </script>
<script>
    function updateDisabledInputs(inputId) {
        const inputValue = document.getElementById(inputId).value;
        document.getElementById('cube-side2').value = inputValue;
        document.getElementById('cube-side3').value = inputValue;
    }

    function resetForm(shape) {
        // Reset input fields
        document.getElementById('cube-side1').value = '';
        document.getElementById('cube-side2').value = '';
        document.getElementById('cube-side3').value = '';

        // Reset output
        document.getElementById('cube-volume').innerText = '';

        console.log(`Resetting ${shape} form...`);
    }

    function calculateVolume(shape) {
        let volume = 0;

        switch (shape) {
            case 'cube':
                const cubeSide = parseFloat(document.getElementById('cube-side1').value);

                if (!isNaN(cubeSide)) {
                    volume = Math.pow(cubeSide, 3);
                    document.getElementById('cube-volume').innerText = `Volume: ${volume.toFixed(2)}`;
                } else {
                    document.getElementById('cube-volume').innerText = 'Please enter a valid side length.';
                }
                break;

            // Add cases for other shapes if needed

            default:
                console.log('Invalid shape');
        }
    }
</script>
@endsection
