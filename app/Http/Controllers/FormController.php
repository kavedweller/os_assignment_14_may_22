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
