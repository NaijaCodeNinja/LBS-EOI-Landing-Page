<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsletterSubscriber; // Tells the controller where our model is

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validate the incoming data
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ]);

        // 2. Save it to the database
        NewsletterSubscriber::create($validated);

        // 3. Send a success message back to the frontend
        return response()->json([
            'message' => 'Successfully subscribed to the newsletter!'
        ], 201);
    }
}