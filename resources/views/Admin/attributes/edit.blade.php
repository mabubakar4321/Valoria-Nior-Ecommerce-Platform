@extends('Admin.Dashbaord.layout')

@section('content')
<div class="main-content">
<div class="card shadow">
    <div class="card-header">
        <h4>Edit Attribute</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.attributes.update', $attribute->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Select Category
            <div class="mb-3">
                <label class="form-label">Select Category</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $attribute->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div> --}}

            {{-- Attribute Name --}}
            <div class="mb-3">
                <label class="form-label">Attribute Name</label>
                <input type="text"
                       name="name"
                       value="{{ $attribute->name }}"
                       class="form-control"
                       required>
            </div>

            {{-- Attribute Values --}}
            <div class="mb-3">
                <label class="form-label">Attribute Values</label>

                <div id="values-wrapper">

                    @foreach($attribute->values as $value)
                        <div class="d-flex mb-2 value-row">
                            <input type="text"
                                   name="values[]"
                                   value="{{ $value->value }}"
                                   class="form-control me-2">
                            <button type="button"
                                    class="btn btn-danger btn-sm"
                                    onclick="removeRow(this)">
                                X
                            </button>
                        </div>
                    @endforeach

                </div>

                <button type="button"
                        class="btn btn-secondary btn-sm mt-2"
                        onclick="addValue()">
                    + Add More
                </button>
            </div>

            <button type="submit" class="btn btn-primary">
                Update Attribute
            </button>

        </form>

    </div>
</div>

{{-- JS for Dynamic Fields --}}
<script>
    function addValue() {
        let wrapper = document.getElementById('values-wrapper');

        let html = `
            <div class="d-flex mb-2 value-row">
                <input type="text"
                       name="values[]"
                       class="form-control me-2">
                <button type="button"
                        class="btn btn-danger btn-sm"
                        onclick="removeRow(this)">
                    X
                </button>
            </div>
        `;

        wrapper.insertAdjacentHTML('beforeend', html);
    }

    function removeRow(button) {
        button.closest('.value-row').remove();
    }
</script>


</div>