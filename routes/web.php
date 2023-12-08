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
Route::get('/register', [AuthController::class, 'createUser'])->name('create.user');
Route::post('/register', [AuthController::class, 'storeUser'])->name('store.user');

// User Login Routes
Route::view('/login', 'user.user-login')->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// User Dashboard
Route::get('/home', [UserController::class, 'index'])->name('user.dashboard');

Route::middleware(['auth'])->group(function () {
// Calculate Maths Routes
Route::get('/addition', [MathController::class, 'addition'])->name('addition.index');
Route::get('/subtraction', [MathController::class, 'subtraction'])->name('subtraction.index');
Route::get('/multiplication', [MathController::class, 'multiplication'])->name('multiplication.index');
Route::get('/division', [MathController::class, 'division'])->name('division.index');
// Route::get('/lcm', [MathController::class, 'lcm'])->name('lcm.index');
// Route::get('/hcf', [MathController::class, 'hcf'])->name('hcf.index');
// Route::get('/bodmas', [MathController::class, 'bodmas'])->name('bodmas.index');

Route::get('/add-fractions', [MathController::class, 'addFractions'])->name('add-fractions.index');
Route::get('/subtract-fractions', [MathController::class, 'subtractFractions'])->name('subtract-fractions.index');
Route::get('/multiply-fractions', [MathController::class, 'multiplyFractions'])->name('multiply-fractions.index');
Route::get('/division-fractions', [MathController::class, 'divisionFractions'])->name('division-fractions.index');

Route::get('/add-mixed-fractions', [MathController::class, 'addMixedFractions'])->name('add-mixed-fractions.index');
Route::get('/subtract-mixed-fractions', [MathController::class, 'subtractMixedFractions'])->name('subtract-mixed-fractions.index');
Route::get('/multiply-mixed-fractions', [MathController::class, 'multiplyMixedFractions'])->name('multiply-mixed-fractions.index');
Route::get('/divide-mixed-fractions', [MathController::class, 'divisionMixedFractions'])->name('divide-mixed-fractions.index');

// Calculator Routes
Route::get('/standard-calculator', [CalculatorController::class, 'standardCalculator'])->name('standard-calculator.index');
Route::get('/percentage-calculator', [CalculatorController::class, 'percentageCalculator'])->name('percentage-calculator.index');
Route::get('/probability-calculator', [CalculatorController::class, 'probabilityCalculator'])->name('probability-calculator.index');

Route::get('/geometry-calculator', [CalculatorController::class, 'geometryCalculator'])->name('geometry-calculator.index');
Route::get('/area-calculator', [CalculatorController::class, 'areaCalculator'])->name('area-calculator.index');
Route::get('/volume-calculator', [CalculatorController::class, 'volumeCalculator'])->name('volume-calculator.index');

Route::get('/age-calculator', [CalculatorController::class, 'ageCalculator'])->name('age-calculator.index');
Route::get('/bmi-calculator', [CalculatorController::class, 'bmiCalculator'])->name('bmi-calculator.index');
Route::get('/gpa-calculator', [CalculatorController::class, 'gpaCalculator'])->name('gpa-calculator.index');

// Converter Routes
Route::get('/storage-converter', [ConverterController::class, 'storageConverter'])->name('storage-converter.index');
Route::get('/temperature-converter', [ConverterController::class, 'temperatureConverter'])->name('temperature-converter.index');
Route::get('/pressure-converter', [ConverterController::class, 'pressureConverter'])->name('pressure-converter.index');
Route::get('/energy-converter', [ConverterController::class, 'energyConverter'])->name('energy-converter.index');

Route::get('/metric-imperial-converter', [ConverterController::class, 'metricToImperialConverter'])->name('metric-imperial-converter.index');
Route::get('/time-zone-converter', [ConverterController::class, 'timezoneConverter'])->name('time-zone-converter.index');
Route::get('/gpa-percentage-converter', [ConverterController::class, 'gpaToPercentageConverter'])->name('gpa-percentage-converter.index');
Route::get('/interest-rate-converter', [ConverterController::class, 'interestRateConverter'])->name('interest-rate-converter.index');

Route::get('/binary-converter', [ConverterController::class, 'binaryConverter'])->name('binary-converter.index');
Route::get('/decimal-converter', [ConverterController::class, 'decimalConverter'])->name('decimal-converter.index');
Route::get('/octal-converter', [ConverterController::class, 'octalConverter'])->name('octal-converter.index');
Route::get('/hexadecimal-converter', [ConverterController::class, 'hexadecimalConverter'])->name('hexadecimal-converter.index');

});
