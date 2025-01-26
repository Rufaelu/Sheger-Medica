<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RemediesController extends Controller
{
    // Display a listing of remedies
    public function index()
    {
        $remedies = Remedy::with(['herb', 'user'])->get();
        return response()->json($remedies);
    }

    // Show the form for creating a new remedy
    public function create()
    {
        $herbs = Herb::all(); // Get all herbs for selection
        return view('remedies.create', compact('herbs'));
    }

    // Store a newly created remedy
    public function store(Request $request)
    {$validated = $request->validate([
        'title' => 'required|string|max:255',
        'herb_ids' => 'required|array', // Expect an array of herb IDs
        'herb_ids.*' => 'exists:herbs,herb_id', // Validate each herb ID exists in the herbs table
        'preparation_steps' => 'required|string',
        'dosage' => 'nullable|string|max:255',
        'ailment' => 'required|string|max:255',
        'posted_by' => 'required|exists:users,user_id',
        'status' => 'required|boolean',
    ]);

// Create the remedy
        $remedy = Remedy::create([
            'title' => $validated['title'],
            'preparation_steps' => $validated['preparation_steps'],
            'dosage' => $validated['dosage'] ?? null,
            'ailment' => $validated['ailment'],
            'posted_by' => $validated['posted_by'],
            'status' => $validated['status'],
        ]);

// Attach the herbs to the remedy (many-to-many relationship)
        $remedy->herbs()->attach($validated['herb_ids']);

        return response()->json(['message' => 'Remedy created successfully!'], 201);}

    // Display a specific remedy
    public function show($id)
    {
        $remedy = Remedy::with(['herb', 'user', 'reviews'])->findOrFail($id);
        return view('remedies.show', ['remedy' => $remedy]);
    }

    // Show the form for editing a remedy
    public function edit($id)
    {
        $remedy = Remedy::findOrFail($id);
        $herbs = Herb::all();
        return view('remedies.edit', compact('remedy', 'herbs'));
    }

    // Update the specified remedy
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'herb_id' => 'required|exists:herbs,herb_id',
            'preparation_steps' => 'required|string',
            'dosage' => 'required|string|max:255',
            'ailment' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $remedy = Remedy::findOrFail($id);
        $remedy->update($validated);

        return response()->json(['message' => 'Remedy updated successfully!']);
    }

    // Delete the specified remedy
    public function destroy($id)
    {
        $remedy = Remedy::findOrFail($id);
        $remedy->delete();

        return response()->json(['message' => 'Remedy deleted successfully!']);
    }
}
