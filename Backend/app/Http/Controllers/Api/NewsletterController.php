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

    // 1. GET: List all subscribers
    public function index()
    {
        // Use the Model to get all subscribers from the database
        $subscribers = NewsletterSubscriber::all();
        
        // Return them as a JSON response with a 200 (OK) status code
        return response()->json($subscribers, 200);
    }

    // 2. PUT: Edit a specific subscriber
    public function update(Request $request, $id)
    {
        // Find the specific user by their ID, or fail and throw a 404 error
        $subscriber = NewsletterSubscriber::findOrFail($id);

        // Validate the incoming data (just like you did in the store function!)
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            // Note: Email validation for updates is tricky because they might keep 
            // the same email. We'll keep it simple for now:
            'email' => 'required|string|email|max:255', 
        ]);

        // Update the record using the validated data
        $subscriber->update($validated);

        // Return a success message
        return response()->json([
            'message' => 'Subscriber updated successfully!',
            'data' => $subscriber
        ], 200);
    }

    // 3. DELETE: Remove a subscriber
    public function destroy($id)
    {
        // Find the specific user by their ID
        $subscriber = NewsletterSubscriber::findOrFail($id);
        
        // Delete them from the database
        $subscriber->delete();
        
        // Return a success message
        return response()->json([
            'message' => 'Subscriber deleted successfully!'
        ], 200);
    }
}