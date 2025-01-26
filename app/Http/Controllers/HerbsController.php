<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HerbsController extends Controller
{
    // Display a listing of herbs
    public function index()
    {
        $herbs = Herb::with('user')->get();

        return response()->json($herbs);
    }

    // Store a newly created herb
    public function store(Request $request)
    {
        $validated = $request->validate([
            'local_name' => 'required|string|max:255',
            'scientific_name' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'benefits' => 'required|string',
            'risks' => 'nullable|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            'posted_by' => 'required|exists:users,user_id',
            'status' => 'required|boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('image_path')) {
            $path = public_path('images/herbs'); // Define the folder path

// Check if the folder exists, if not, create it
            if (!file_exists($path)) {
                mkdir($path, 0777, true); // Create folder with appropriate permissions
            }

// Store the image in the specified folder
            $validated['image_path'] = $request->file('image_path')->store('images/herbs', 'public');
        }

        Herb::create($validated);
        return response()->json(['message' => 'Herb created successfully!'], 201);
    }

    // Display a specific herb
    public function show($id)
    {
        $herb = Herb::with(['user', 'remedies'])->findOrFail($id);
        return view('herbs.show', ['herb' => $herb]);
    }

    // Show the form for editing a herb
    public function edit($id)
    {
        $herb = Herb::findOrFail($id);
        return view('herbs.edit', compact('herb'));
    }

    // Update the specified herb
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'local_name' => 'required|string|max:255',
            'scientific_name' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'benefits' => 'required|string',
            'risks' => 'nullable|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|boolean',
        ]);

        $herb = Herb::findOrFail($id);

        // Handle image upload
        if ($request->hasFile('image_path')) {
            $herbsPath = public_path('images/herbs'); // Define the path

            // Check if the directory exists, if not, create it
            if (!File::exists($herbsPath)) {
                File::makeDirectory($herbsPath, 0755, true); // Create the directory with appropriate permissions
            }

            // Store the file in the specified directory
            $file = $request->file('image_path');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Generate a unique file name
            $file->move($herbsPath, $fileName);

            $validated['image_path'] = 'images/herbs/' . $fileName; // Save the relative path to the database
        }

        $herb->update($validated);

        return redirect()->back()->with('success', 'Herb updated successfully!');
    }

    // Delete the specified herb
    public function destroy($id)
    {
        $herb = Herb::findOrFail($id);
        $herb->delete();

        return redirect()->back()->with('success', 'Herb deleted successfully!');
    }
}
