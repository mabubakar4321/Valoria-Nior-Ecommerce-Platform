<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    // =========================
    // Show All Categories
    // =========================
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    // =========================
    // Create Form
    // =========================
    public function create()
    {
        return view('admin.categories.create');
    }

    // =========================
    // Store Category
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $imagePath = $request->file('image')->store('categories', 'public');

        Category::create([
            'title' => $request->title,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully.');
    }

    // =========================
    // Show Single Category
    // =========================
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    // =========================
    // Edit Form
    // =========================
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // =========================
    // Update Category
    // =========================
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if ($request->hasFile('image')) {

            // delete old image
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }

            $imagePath = $request->file('image')->store('categories', 'public');
            $category->image = $imagePath;
        }

        $category->title = $request->title;
        $category->save();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    // =========================
    // Delete Category
    // =========================
    public function destroy(Category $category)
    {
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return back()->with('success', 'Category deleted successfully.');
    }
}