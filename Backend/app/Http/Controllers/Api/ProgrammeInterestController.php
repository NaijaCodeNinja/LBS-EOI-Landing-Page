<?php

namespace App\Http\Controllers\Api; 

use App\Http\Controllers\Controller; // <-- This tells it where the base controller is
use Illuminate\Http\Request;
use App\Models\ProgrammeInterest;

class ProgrammeInterestController extends Controller
{
    public function store(Request $request)
    {
        // 1. VALIDATION
        // Create a $validated variable.
        $validated = $request->validate ([
            'full_name' => 'required|string|max:255', 
            'email' => 'required|string|email|max:255', 
            'phone_number' => 'required|string|max:20', 
            'programme' => 'required|string|max:255', 
            'message' => 'nullable|string'
        ]);

        // 2. CREATION
        // Use `ProgrammeInterest` model to create a new record in the database 
        // passing in the $validated array.        
        ProgrammeInterest::create($validated);

        // 3. RESPONSE
        // Return a JSON response with a success message and a 201 status code.
        
        return response()->json([
            'message' => 'Interest registered successfully!', 
        ], 201);
    }
}
