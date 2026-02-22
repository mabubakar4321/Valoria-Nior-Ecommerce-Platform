<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
{
    $products = Product::with('category','images','attributeValues')
        ->latest()
        ->get();

    return view('Admin.products.index', compact('products'));
}

public function create()
{
    $categories = Category::all();
    $attributes = Attribute::with('values')->get();

    return view('Admin.products.create', compact('categories','attributes'));
}



public function store(Request $request)
{
    $product = Product::create([
        'name' => $request->name,
        'category_id' => $request->category_id,
        'description' => $request->description,
        'product_type' => $request->product_type,
        'original_price' => $request->original_price,
        'discount_price' => $request->discount_price,
        'sku' => $request->sku,
        'quantity' => $request->quantity,
    ]);

    // Upload Multiple Images
    if($request->hasFile('images')){
        foreach($request->file('images') as $image){
            $path = $image->store('products','public');

            ProductImage::create([
                'product_id' => $product->id,
                'image' => $path
            ]);
        }
    }

    // Save Selected Attribute Values
    if($request->attribute_values){
        foreach($request->attribute_values as $attribute_id => $values){
            foreach($values as $value_id){
                DB::table('product_attribute_values')->insert([
                    'product_id' => $product->id,
                    'attribute_id' => $attribute_id,
                    'attribute_value_id' => $value_id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }

    return redirect()->route('admin.products.index');
}

public function show(Product $product)
{
    $product->load('category','images','attributeValues.attribute');

    return view('Admin.products.show', compact('product'));
}

public function edit(Product $product)
{
    $categories = Category::all();
    $attributes = Attribute::with('values')->get();

    $product->load('images','attributeValues');

    return view('Admin.products.edit', compact(
        'product',
        'categories',
        'attributes'
    ));
}

public function update(Request $request, Product $product)
{
    // 1️⃣ Update Product Basic Info
    $product->update([
        'name'           => $request->name,
        'category_id'    => $request->category_id,
        'description'    => $request->description,
        'product_type'   => $request->product_type,
        'original_price' => $request->original_price,
        'discount_price' => $request->discount_price,
        'sku'            => $request->sku,
        'quantity'       => $request->quantity,
    ]);

    // 2️⃣ Upload New Images (keep old ones)
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('products', 'public');

            $product->images()->create([
                'image' => $path
            ]);
        }
    }

    // 3️⃣ Sync Attribute Values (Clean Way)

    $syncData = [];

    if ($request->attribute_values) {
        foreach ($request->attribute_values as $attribute_id => $values) {
            foreach ($values as $value_id) {

                // attach value_id with extra pivot column attribute_id
                $syncData[$value_id] = [
                    'attribute_id' => $attribute_id
                ];
            }
        }
    }

    // This automatically deletes old and inserts new
    $product->attributeValues()->sync($syncData);

    return redirect()
        ->route('admin.products.index')
        ->with('success', 'Product Updated Successfully');
}


public function destroy(Product $product)
{
    // Delete images from storage
    foreach($product->images as $image){
        Storage::disk('public')->delete($image->image);
    }

    $product->delete();

    return redirect()->route('admin.products.index')
        ->with('success','Product Deleted Successfully');
}





}
