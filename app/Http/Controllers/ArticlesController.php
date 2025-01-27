<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArticlesController extends Controller
{
    // Display a listing of articles
    public function index()
    {
        $articles = Articles::with('author')->get();

        return response()->json($articles);
    }

    // Store a newly created article
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author_id' => 'required|exists:users,user_id',
            'status' => 'required|boolean',
        ]);

        Articles::create($validated);

        return response()->json(['message' => 'Article created successfully!'], 201);
    }

    // Display a specific article
    public function show($id)
    {
        $article = Articles::with('author')->findOrFail($id);
        return view('articles.show', ['article' => $article]);
    }

    // Show the form for editing an article
    public function edit($id)
    {
        $article = Articles::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    // Update the specified article
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $article = Articles::findOrFail($id);
        $article->update($validated);

        return redirect()->back()->with('success', 'Article updated successfully!');
    }

    // Delete the specified article
    public function destroy($id)
    {
        $article = Articles::findOrFail($id);
        $article->delete();

        return redirect()->back()->with('success', 'Article deleted successfully!');
    }
}
