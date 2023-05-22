<?php


use Illuminate\Http\Request;

Route::get('/api/endpoint', function (Request $request) {
    $page = $request->query('page');

    // Check if the 'page' parameter is present
    if ($page === null) {
        $page = null; // Set $page to null if the parameter is not present
    }

    // Perform any additional processing here

    return response()->json([
        'page' => $page
    ]);
});