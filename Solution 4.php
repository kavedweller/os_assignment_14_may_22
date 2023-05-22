<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    function RespondWith(Request $request): JsonResponse
    {

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
