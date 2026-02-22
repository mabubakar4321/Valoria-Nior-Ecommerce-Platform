<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poster;
use Illuminate\Http\Request;

class PosterController extends Controller
{
    // Show All Posters
    public function index()
    {
        $posters = Poster::latest()->get();
        return view('Admin.posters.index', compact('posters'));
    }
    public function show(Poster $poster)
{
    return view('Admin.posters.show', compact('poster'));
}

    // Show Upload Form
    public function create()
    {
        return view('Admin.posters.create');
    }

    // Store Multiple Posters
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'images' => 'required',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        foreach ($request->file('images') as $image) {

            $path = $image->store('posters', 'public');

            Poster::create([
                'type' => $request->type,
                'image' => $path,
            ]);
        }

        return redirect()->route('admin.posters.index')
            ->with('success', 'Posters Uploaded Successfully');
    }

    // Delete Poster
    public function destroy(Poster $poster)
    {
        if (file_exists(storage_path('app/public/'.$poster->image))) {
            unlink(storage_path('app/public/'.$poster->image));
        }

        $poster->delete();

        return back()->with('success','Poster Deleted Successfully');
    }
    public function update(Request $request, Poster $poster)
{
    $request->validate([
        'type' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $data = [
        'type' => $request->type,
    ];

    // If new image uploaded
    if ($request->hasFile('image')) {

        // Delete old image
        if (file_exists(storage_path('app/public/' . $poster->image))) {
            unlink(storage_path('app/public/' . $poster->image));
        }

        $data['image'] = $request->file('image')
                                  ->store('posters', 'public');
    }

    $poster->update($data);

    return redirect()->route('admin.posters.index')
        ->with('success', 'Poster Updated Successfully');
}



public function edit(Poster $poster)
{
    return view('Admin.posters.edit', compact('poster'));
}
}