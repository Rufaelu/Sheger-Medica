<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Herbs;
class HerbsController extends Controller
{
    // Display a listing of herbs
    public function index()
    {
        $herbs = Herbs::all();
        return view('herbs.all', ['herbs' => $herbs]);
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
        ]);

        // Handle image upload
        if ($request->hasFile('image_path')) {

            $herbsPath = public_path('images/herbs'); // Define the public/certificates path

            // Check if the directory exists, and create it if it doesn't
            if (!File::exists($herbsPath)) {
                File::makeDirectory($herbsPath, 0755, true); // Create the directory with permissions
            }

            // Save the file in the public/certificates directory
            $herb = $request->file('image_path');
            $fileName = uniqid() . '.' . $herb->getClientOriginalExtension(); // Generate a unique file name
            $herb->move($herbsPath, $fileName); // Move the file to the directory

            $validated['image_path'] = 'images/herbs/' . $fileName;
        }


        Herbs::create($validated);
        return redirect()->route('post');
    }


    // Display a specific herb
    public function show($id)
    {
        $herb = Herbs::with(['user', 'remedies'])->findOrFail($id);
        return view('herbs.show', ['herb' => $herb]);
    }
    public function populatePost()
    {
        $herbs = Herbs::all();
        return view('post',['herbs' => $herbs]);
    }

    // Show the form for editing a herb
    public function edit($id)
    {
        $herb = Herbs::findOrFail($id);
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
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'        ]);

        $herb = Herbs::findOrFail($id);

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
