@extends('layouts.app')
<style>
    .container {
        max-width: 600px;
        margin: 0 auto;
    }

    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);
        transition: box-shadow 0.3s ease;
        margin-top: 100px;
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

    #result {
        margin-top: 20px;
        font-weight: bold;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5>Data Storage Converter</h5>
                    <form id="data-storage-converter-form">
                        <div class="mb-3">
                            <label for="dataSize" class="form-label">Data Size:</label>
                            <input type="number" step="0.01" id="dataSize" class="form-control" placeholder="Enter data size" required>
                        </div>
                        <div class="mb-3">
                            <label for="fromUnit" class="form-label">From Unit:</label>
                            <select id="fromUnit" class="form-select">
                                <option value="bit">Bit</option>
                                <option value="byte">Byte</option>
                                <option value="kb">Kilobit (kb)</option>
                                <option value="KB">Kilobyte (KB)</option>
                                <option value="Mb">Megabit (Mb)</option>
                                <option value="MB">Megabyte (MB)</option>
                                <option value="Gb">Gigabit (Gb)</option>
                                <option value="GB">Gigabyte (GB)</option>
                                <option value="Tb">Terabit (Tb)</option>
                                <option value="TB">Terabyte (TB)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="toUnit" class="form-label">To Unit:</label>
                            <select id="toUnit" class="form-select">
                                <option value="bit">Bit</option>
                                <option value="byte">Byte</option>
                                <option value="kb">Kilobit (kb)</option>
                                <option value="KB">Kilobyte (KB)</option>
                                <option value="Mb">Megabit (Mb)</option>
                                <option value="MB">Megabyte (MB)</option>
                                <option value="Gb">Gigabit (Gb)</option>
                                <option value="GB">Gigabyte (GB)</option>
                                <option value="Tb">Terabit (Tb)</option>
                                <option value="TB">Terabyte (TB)</option>
                            </select>
                        </div>
                        <button type="button" onclick="resetDataStorageForm()" class="btn btn-danger">Reset</button>
                        <button type="button" onclick="convertDataStorage()" class="btn btn-success">Convert</button>
                        <div class="mb-3">
                            <br>
                            <label for="conversionResult" class="form-label"></label>
                            <span id="conversionResultDisplay"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function resetDataStorageForm() {
        document.getElementById('dataSize').value = '';
        document.getElementById('fromUnit').value = 'bit';
        document.getElementById('toUnit').value = 'byte';
        document.getElementById('conversionResultDisplay').innerText = '';
    }

    function convertDataStorage() {
        var dataSize = parseFloat(document.getElementById('dataSize').value);
        var fromUnit = document.getElementById('fromUnit').value;
        var toUnit = document.getElementById('toUnit').value;
        var conversionResult;

        switch (fromUnit) {
            case 'bit':
                dataSize /= 8; // 1 byte = 8 bits
                break;
            case 'byte':
                break;
            case 'kb':
                dataSize *= 8; // 1 kilobit = 8 kilobytes
                break;
            case 'KB':
                dataSize *= 1024; // 1 kilobyte = 1024 bytes
                break;
            case 'Mb':
                dataSize *= 8 * 1024; // 1 megabit = 8 kilobytes = 8192 bytes
                break;
            case 'MB':
                dataSize *= 1024 * 1024; // 1 megabyte = 1024 kilobytes = 1048576 bytes
                break;
            case 'Gb':
                dataSize *= 8 * 1024 * 1024; // 1 gigabit = 8 megabytes = 8388608 bytes
                break;
            case 'GB':
                dataSize *= 1024 * 1024 * 1024; // 1 gigabyte = 1024 megabytes = 1073741824 bytes
                break;
            case 'Tb':
                dataSize *= 8 * 1024 * 1024 * 1024; // 1 terabit = 8 gigabytes = 8589934592 bytes
                break;
            case 'TB':
                dataSize *= 1024 * 1024 * 1024 * 1024; // 1 terabyte = 1024 gigabytes = 1099511627776 bytes
                break;
            default:
                alert('Invalid conversion');
                return;
        }

        switch (toUnit) {
            case 'bit':
                conversionResult = dataSize * 8; // 1 byte = 8 bits
                break;
            case 'byte':
                conversionResult = dataSize;
                break;
            case 'kb':
                conversionResult = dataSize / 8; // 1 kilobit = 8 kilobytes
                break;
            case 'KB':
                conversionResult = dataSize / 1024; // 1 kilobyte = 1024 bytes
                break;
            case 'Mb':
                conversionResult = dataSize / (8 * 1024); // 1 megabit = 8 kilobytes = 8192 bytes
                break;
            case 'MB':
                conversionResult = dataSize / (1024 * 1024); // 1 megabyte = 1024 kilobytes = 1048576 bytes
                break;
            case 'Gb':
                conversionResult = dataSize / (8 * 1024 * 1024); // 1 gigabit = 8 megabytes = 8388608 bytes
                break;
            case 'GB':
                conversionResult = dataSize / (1024 * 1024 * 1024); // 1 gigabyte = 1024 megabytes = 1073741824 bytes
                break;
            case 'Tb':
                conversionResult = dataSize / (8 * 1024 * 1024 * 1024); // 1 terabit = 8 gigabytes = 8589934592 bytes
                break;
            case 'TB':
                conversionResult = dataSize / (1024 * 1024 * 1024 * 1024); // 1 terabyte = 1024 gigabytes = 1099511627776 bytes
                break;
            default:
                alert('Invalid conversion');
                return;
        }

        // Display result up to 4 decimal places
        document.getElementById('conversionResultDisplay').innerText = "Conversion Result: " + conversionResult.toFixed(4);
    }
</script>
@endsection
