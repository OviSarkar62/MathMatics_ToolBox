@extends('layouts.app')
<style>

    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
        margin-top: 100px;
    }

    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-body {
        padding: 20px;
    }

    .alert {
        margin-bottom: 20px;
    }

    h5 {
        margin-bottom: 20px;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    ul li {
        margin-bottom: 10px;
    }

    ul li a {
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
    }

    ul li a:hover {
        text-decoration: underline;
    }
    /* Responsive adjustments */
        .calculator {
            width: 630px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            box-sizing: border-box;
        }

        #display {
            width: 100%;
            padding: 10px;
            font-size: 1.5em;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        button {
            width: 25%;
            padding: 10px;
            font-size: 1em;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f8f8f8;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #e0e0e0;
        }

        button.btn-success {
            background-color: #28a745;
            color: #fff;
        }

        button.btn-success:hover {
            background-color: #218838;
        }

        @media screen and (max-width: 600px) {
            .calculator {
                width: 90%;
            }

            button {
                width: 30%;
            }
        }

</style>

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="calculator">
                    <h5>Arithmetic Calculator</h5>
                    <form id="calculator-form">
                        <input type="text" id="display" placeholder="0" disabled>
                        <div>
                            <button type="button" onclick="appendToDisplay('1')">1</button>
                            <button type="button" onclick="appendToDisplay('2')">2</button>
                            <button type="button" onclick="appendToDisplay('3')">3</button>
                            <button type="button" onclick="operate('+')">+</button>
                        </div>
                        <div>
                            <button type="button" onclick="appendToDisplay('4')">4</button>
                            <button type="button" onclick="appendToDisplay('5')">5</button>
                            <button type="button" onclick="appendToDisplay('6')">6</button>
                            <button type="button" onclick="operate('-')">-</button>
                        </div>
                        <div>
                            <button type="button" onclick="appendToDisplay('7')">7</button>
                            <button type="button" onclick="appendToDisplay('8')">8</button>
                            <button type="button" onclick="appendToDisplay('9')">9</button>
                            <button type="button" onclick="operate('*')">*</button>
                        </div>
                        <div>
                            <button type="button" onclick="appendToDisplay('0')">0</button>
                            <button type="button" onclick="appendToDisplay('.')">.</button>
                            <button type="button" onclick="clearDisplay()">C</button>
                            <button type="button" onclick="operate('/')">/</button>
                        </div>
                        <div>
                            <button type="button" onclick="clearDisplay()">Reset</button>
                            <button type="button" onclick="backspace()">x</button>
                            <button type="button" onclick="calculate()" class="btn btn-success">=</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function appendToDisplay(value) {
        document.getElementById('display').value += value;
    }

    function clearDisplay() {
        document.getElementById('display').value = '';
    }

    function backspace() {
        var displayValue = document.getElementById('display').value;
        document.getElementById('display').value = displayValue.substring(0, displayValue.length - 1);
    }

    function operate(operator) {
        appendToDisplay(operator);
    }

    function calculate() {
        try {
            var result = eval(document.getElementById('display').value);

            if (!isFinite(result)) {
                throw new Error('Math Error');
            }

            document.getElementById('display').value = result.toFixed(2);
        } catch (error) {
            document.getElementById('display').value = 'Math Error';
        }
    }
</script>


@endsection
