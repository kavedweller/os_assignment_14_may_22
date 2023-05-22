<?
/*
Assuming the routes/web.php has the following lines:
USE App\Http\Controllers\FormController;
Route::post('/submit-form', [FormController::class, 'submit']);
*/


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function submit(Request $request)
    {
        $name = $request->input('name');
        
    }
}
