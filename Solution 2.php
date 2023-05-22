<?php
/*
Assuming the routes/web.php has the following lines:

USE App\Http\Controllers\UserAgentController;
Route::post('/submit-form', [UserAgentController::class, 'index']);
*/


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAgentController extends Controller
{
    public function index(Request $request)
    {
        $userAgent = $request->header('User-Agent');
    }
}