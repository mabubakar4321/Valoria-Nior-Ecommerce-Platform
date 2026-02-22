<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Category;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index()
    {
        $attributes = Attribute::with('values')->latest()->get();
        return view('Admin.attributes.index', compact('attributes'));
    }

    public function create()
    {
       
        return view('Admin.attributes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
           
            'name' => 'required'
        ]);

        $attribute = Attribute::create([
            
            'name' => $request->name
        ]);

        if($request->values){
            foreach($request->values as $value){
                if($value){
                    AttributeValue::create([
                        'attribute_id' => $attribute->id,
                        'value' => $value
                    ]);
                }
            }
        }

        return redirect()->route('admin.attributes.index')
            ->with('success','Attribute Created Successfully');
    }

    public function edit(Attribute $attribute)
    {
       
        $attribute->load('values');
        return view('Admin.attributes.edit', compact('attribute'));
    }

    public function update(Request $request, Attribute $attribute)
    {
        $request->validate([
           
            'name' => 'required'
        ]);

        $attribute->update([
           
            'name' => $request->name
        ]);

        $attribute->values()->delete();

        if($request->values){
            foreach($request->values as $value){
                if($value){
                    AttributeValue::create([
                        'attribute_id' => $attribute->id,
                        'value' => $value
                    ]);
                }
            }
        }

        return redirect()->route('admin.attributes.index')
            ->with('success','Attribute Updated Successfully');
    }

    public function destroy(Attribute $attribute)
    {
        $attribute->delete();
        return back()->with('success','Attribute Deleted Successfully');
    }
}