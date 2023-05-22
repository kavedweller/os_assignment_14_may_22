<?php

use App\Http\Controllers\FormController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [FormController::class, 'index']);

// Problem-1 & 2 route
Route::post('/form-submit', [FormController::class, 'formSubmit'])->name('form-submit');

// Problem-3 route
Route::get('/page/{query}', [FormController::class, 'page']);

// Problem-4 & 6 route
Route::get('/request',[FormController::class, 'sendResponse']);

// Problem-7 solution
Route::post('/submit', function (Request $request):JsonResponse{
    $email = $request->input('email');
    return response()->json([
        'success' => true,
        'message' => 'Form submitted successfully.'
    ]);
});