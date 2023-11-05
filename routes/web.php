<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\ConverterController;
use App\Http\Controllers\MathController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

// User Registration Routes
Route::get('/register/user', [AuthController::class, 'createUser'])->name('create.user');
Route::post('/register/user', [AuthController::class, 'storeUser'])->name('store.user');

// User Login Routes
Route::view('/login', 'user.user-login')->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// User Dashboard
Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');

// Calculate Maths Routes
Route::get('/addition', [MathController::class, 'addition'])->name('addition.index');
Route::get('/subtraction', [MathController::class, 'subtraction'])->name('subtraction.index');
Route::get('/multiplication', [MathController::class, 'multiplication'])->name('multiplication.index');
Route::get('/division', [MathController::class, 'division'])->name('division.index');
Route::get('/lcm', [MathController::class, 'lcm'])->name('lcm.index');
Route::get('/hcf', [MathController::class, 'hcf'])->name('hcf.index');
Route::get('/bodmas', [MathController::class, 'bodmas'])->name('bodmas.index');
Route::get('/add-fractions', [MathController::class, 'addFractions'])->name('add-fractions.index');
Route::get('/subtract-fractions', [MathController::class, 'subtractFractions'])->name('subtract-fractions.index');
Route::get('/multiply-fractions', [MathController::class, 'multiplyFractions'])->name('multiply-fractions.index');
Route::get('/division-fractions', [MathController::class, 'divisionFractions'])->name('division-fractions.index');
Route::get('/add-mixed-fractions', [MathController::class, 'addMixedFractions'])->name('add-mixed-fractions.index');
Route::get('/subtract-mixed-fractions', [MathController::class, 'subtractMixedFractions'])->name('subtract-mixed-fractions.index');
Route::get('/multiply-mixed-fractions', [MathController::class, 'multiplyMixedFractions'])->name('multiply-mixed-fractions.index');
Route::get('/division-mixed-fractions', [MathController::class, 'divisionMixedFractions'])->name('division-mixed-fractions.index');
Route::get('/mixed-number-to-decimal', [MathController::class, 'mixedNumberToDecimal'])->name('mixed-number-to-decimal.index');
Route::get('/fraction-ascending-order', [MathController::class, 'fractionAscendingOrder'])->name('fraction-ascending-order.index');
Route::get('/fraction-descending-order', [MathController::class, 'fractionDescendingOrder'])->name('fraction-descending-order.index');
Route::get('/smallest-number', [MathController::class, 'smallestNumber'])->name('smallest-number.index');
Route::get('/largest-number', [MathController::class, 'largestNumber'])->name('largest-number.index');
Route::get('/average-of-mixed-numbers', [MathController::class, 'averageOfMixedNumbers'])->name('average-of-mixed-numbers.index');

// Calculator Routes
Route::get('/standard-calculator', [CalculatorController::class, 'standardCalculator'])->name('standard-calculator.index');
Route::get('/scientific-calculator', [CalculatorController::class, 'scientificCalculator'])->name('scientific-calculator.index');
Route::get('/financial-calculator', [CalculatorController::class, 'financialCalculator'])->name('financial-calculator.index');
Route::get('/geometry-calculator', [CalculatorController::class, 'geometryCalculator'])->name('geometry-calculator.index');
Route::get('/matrix-calculator', [CalculatorController::class, 'matrixCalculator'])->name('matrix-calculator.index');
Route::get('/probability-calculator', [CalculatorController::class, 'probabilityCalculator'])->name('probability-calculator.index');
Route::get('/currency-converter', [CalculatorController::class, 'currencyConverter'])->name('currency-converter.index');
Route::get('/unit-converter', [CalculatorController::class, 'unitConverter'])->name('unit-converter.index');
Route::get('/temperature-converter', [CalculatorController::class, 'temperatureConverter'])->name('temperature-converter.index');
Route::get('/time-calculator', [CalculatorController::class, 'timeCalculator'])->name('time-calculator.index');
Route::get('/date-calculator', [CalculatorController::class, 'dateCalculator'])->name('date-calculator.index');
Route::get('/age-calculator', [CalculatorController::class, 'ageCalculator'])->name('age-calculator.index');
Route::get('/percentage-calculator', [CalculatorController::class, 'percentageCalculator'])->name('percentage-calculator.index');
Route::get('/mortgage-calculator', [CalculatorController::class, 'mortgageCalculator'])->name('mortgage-calculator.index');
Route::get('/bmi-calculator', [CalculatorController::class, 'bmiCalculator'])->name('bmi-calculator.index');
Route::get('/gpa-calculator', [CalculatorController::class, 'gpaCalculator'])->name('gpa-calculator.index');
Route::get('/tip-calculator', [CalculatorController::class, 'tipCalculator'])->name('tip-calculator.index');
Route::get('/loan-calculator', [CalculatorController::class, 'loanCalculator'])->name('loan-calculator.index');

// Converter Routes

Route::get('/unit-converter', [ConverterController::class, 'unitConverter'])->name('unit-converter.index');
Route::get('/temperature-converter', [ConverterController::class, 'temperatureConverter'])->name('temperature-converter.index');
Route::get('/time-converter', [ConverterController::class, 'timeConverter'])->name('time-converter.index');
Route::get('/date-converter', [ConverterController::class, 'dateConverter'])->name('date-converter.index');
Route::get('/metric-to-imperial', [ConverterController::class, 'metricToImperial'])->name('metric-to-imperial.index');
Route::get('/imperial-to-metric', [ConverterController::class, 'imperialToMetric'])->name('imperial-to-metric.index');

Route::get('/volume-converter', [ConverterController::class, 'volumeConverter'])->name('volume-converter.index');
Route::get('/area-converter', [ConverterController::class, 'areaConverter'])->name('area-converter.index');
Route::get('/speed-converter', [ConverterController::class, 'speedConverter'])->name('speed-converter.index');
Route::get('/pressure-converter', [ConverterController::class, 'pressureConverter'])->name('pressure-converter.index');
Route::get('/energy-converter', [ConverterController::class, 'energyConverter'])->name('energy-converter.index');

Route::get('/binary-converter', [ConverterController::class, 'binaryConverter'])->name('binary-converter.index');
Route::get('/decimal-converter', [ConverterController::class, 'decimalConverter'])->name('decimal-converter.index');
Route::get('/octal-converter', [ConverterController::class, 'octalConverter'])->name('octal-converter.index');
Route::get('/hexadecimal-converter', [ConverterController::class, 'hexadecimalConverter'])->name('hexadecimal-converter.index');

