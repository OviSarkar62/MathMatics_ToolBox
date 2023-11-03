@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5>BODMAS Expression Evaluator</h5>
                    <form>
                        <div class="mb-3">
                            <label for="expression" class="form-label">Enter Expression:</label>
                            <input type="text" name="expression" id="expression" class="form-control" placeholder="Enter a math expression">
                        </div>
                        <button type="button" id="reset-input" class="btn btn-danger">Reset</button>
                        <button type="button" id="calculate" class="btn btn-success">Calculate</button>
                    </form>
                    <hr>
                    <div id="result" class="mt-3">
                        <strong>Result:</strong>
                        <div id="result-values"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('reset-input').addEventListener('click', function() {
        const expressionInput = document.getElementById('expression');
        expressionInput.value = '';

        const resultValues = document.getElementById('result-values');
        resultValues.innerHTML = '';
    });

    document.getElementById('calculate').addEventListener('click', function() {
        const expressionInput = document.getElementById('expression');
        const expression = expressionInput.value;

        try {
            const result = math.evaluate(expression);
            displayResult(result);
        } catch (error) {
            displayError();
        }
    });

    function displayResult(result) {
        const resultValues = document.getElementById('result-values');
        resultValues.innerHTML = '<strong>Result:</strong>';
        const resultText = document.createElement('div');
        resultText.innerHTML = result;
        resultValues.appendChild(resultText);
    }

    function displayError() {
        const resultValues = document.getElementById('result-values');
        resultValues.innerHTML = '<strong>Result:</strong>';
        const errorText = document.createElement('div');
        errorText.innerHTML = 'Invalid Expression';
        resultValues.appendChild(errorText);
    }
</script>
@endsection
