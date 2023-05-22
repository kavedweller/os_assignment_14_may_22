### Solutions are added inside the Laravel project.

#### Please check `routes\web.php` and `app\Controllers\FormController.php` files.

##### Contents of `routes\web.php` 
```php

<?php

use App\Http\Controllers\FormController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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
```
##### Contents of  `app\Controllers\FormController.php`

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FormController extends Controller
{


    public function index()
    {
        return view('index');
    }

    public function formSubmit(Request $request)
    {
// Problem 1 solution
        $name = $request->input('name');

// Problem-2 solution
        $userAgent = $request->header('User-Agent');

// Problem-5 solution

        $avatar = $request->file('avatar');
        $fileName = $avatar->getClientOriginalName();
        $avatar->move('uploads', $fileName);


        echo $name, $userAgent;
    }



// Problem-3 solution
    public function page($query)
    {
        if ($query === null)
        {
            $page = null;
        }
        else
        {
            $page = $query;
        }

        echo $page;
    }

    public function sendResponse(Request $request): JsonResponse
    {
// Problem-6 solution
// if cookie is not found it is by default set to null.
        $rememberToken = $request->cookie('remember_token');

// Problem-4 solution
        $data = [
            'name' => 'John Doe',
            'age' => 25
        ];

        $response = [
            'message' => 'Success',
            'data' => $data
        ];

        return response()->json($response);
    }

}
```