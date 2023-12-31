@extends('layouts.app')
<style>
    body {
        /* Left bottom corner SVG */
        background-image: url('/assets/img/arithmetic2.svg');
        background-repeat: no-repeat, no-repeat;
        background-position: left bottom, right bottom;
        background-size: auto, auto; /* Adjust this based on your SVG sizes */
        height: 20vh;
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

    .calculator {
        width: 500px;
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        margin-top: 55px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);
        transition: box-shadow 0.3s ease;
    }

    .calculator:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    #display {
        width: 99%;
        padding: 10px;
        font-size: 1.5em;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        outline: none;
    }

    button {
        width: calc(25% - 3px);
        padding: 12px;
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

    button.btn-primary:hover {
        background-color: #218838;
    }

    .red-button {
        background-color: transparent;
        color: red;
        border: 2px solid red;
        padding: 5px 10px;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }

    .red-button:hover {
        background-color: red;
        color: white;
    }

    .custom-button {
        background-color: transparent;
        color: #2c3e50;
        border: 2px solid #2c3e50;
        padding: 5px 10px;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }

    .custom-button:hover {
        background-color: #2c3e50;
        color: white;
    }

    .equal-button {
        background-color: transparent;
        color: #1abc9c;
        border: 2px solid #1abc9c;
        padding: 5px 10px;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }

    .equal-button:hover {
        background-color: #1abc9c;
        color: white;
    }

    @media screen and (max-width: 600px) {
        .calculator {
            width: 100%;
        }
        #display {
            width: 95%;
        }

        button {
            width: 31%;
        }
    }
</style>

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
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
                        <br>
                        <div>
                            <button type="button" onclick="clearDisplay()" class="red-button">Reset</button>
                            <button type="button" onclick="backspace()" class="custom-button">x</button>
                            <button type="button" onclick="calculate()" class="equal-button">=</button>
                        </div>
                    </form>
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

                document.getElementById('display').value = result.toFixed(4);
            } catch (error) {
                document.getElementById('display').value = 'Math Error';
            }
        }
    </script>
@endsection
