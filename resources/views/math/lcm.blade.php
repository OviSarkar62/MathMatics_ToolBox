@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5>Least Common Multiple (LCM)</h5>
                        <form id="lcm-form">
                            <div class="mb-3">
                                <label for="numbers" class="form-label">Numbers (comma-separated):</label>
                                <input type="text" name="numbers" id="numbers" class="form-control"
                                    placeholder="Enter numbers">
                            </div>
                            <button type="button" id="reset-input" class="btn btn-danger">Reset</button>
                            <button type="button" id="calculate-lcm" class="btn btn-success">Calculate LCM</button>
                        </form>
                        <hr>
                        <div id="result" class="mt-3">
                            <strong>Result:</strong>
                            <div id="output-values"></div>
                            <div id="result-value"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('calculate-lcm').addEventListener('click', function() {
            const numbersInput = document.getElementById('numbers').value;
            const numbers = numbersInput.split(',').map(Number);
            const resultText = formatLCMOutput(numbers);
            document.getElementById('output-values').innerHTML = resultText;
        });

        document.getElementById('reset-input').addEventListener('click', function() {
            document.getElementById('numbers').value = '';
            document.getElementById('output-values').innerHTML = '';
        });

        function formatLCMOutput(numbers) {
            const formattedLines = [];
            const lcm = calculateLCM(numbers);

            for (let i = 2; i <= numbers.length; i++) {
                numbers = numbers.map((num, j) => j % i === 0 ? num : gcd(num, numbers[j - 1]));
                formattedLines.push(`${i} | ${numbers.join(', ')}`);
            }

            const factors = primeFactors(lcm);

            return formattedLines.join('\n---------------------\n') + '\n---------------------\n' + factors.join(' X ') + '\n= ' + lcm;
        }

        function calculateLCM(numbers) {
            if (numbers.length < 2) {
                return 'At least two numbers are required for LCM.';
            }
            return numbers.reduce((a, b) => (a * b) / gcd(a, b));
        }

        function gcd(a, b) {
            if (b === 0) {
                return a;
            }
            return gcd(b, a % b);
        }

        function primeFactors(number) {
            const factors = [];
            let divisor = 2;
            while (number > 2) {
                if (number % divisor === 0) {
                    factors.push(divisor);
                    number = number / divisor;
                } else {
                    divisor++;
                }
            }
            return factors;
        }
    </script>

@endsection
