@extends('Admin.Dashbaord.layout')

@section('content')
<div class="main-content">

    <div class="card shadow">
        <div class="card-header">
            <h4>Create Attribute</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.attributes.store') }}" method="POST">
                @csrf

                {{-- Select Category --}}
                {{-- <div class="mb-3">
                    <label class="form-label">Select Category</label>

                    <select name="category_id" class="form-control" required>
                        <option value="">Select Category</option>

                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">
                                {{ $cat->title }}
                            </option>
                        @endforeach
                    </select>
                </div> --}}

                {{-- Attribute Name --}}
                <div class="mb-3">
                    <label class="form-label">Attribute Name</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           placeholder="Enter Attribute Name"
                           required>
                </div>

                {{-- Attribute Values --}}
                <div class="mb-3">
                    <label class="form-label">Attribute Values</label>

                    <div id="values-wrapper">
                        <div class="d-flex mb-2">
                            <input type="text"
                                   name="values[]"
                                   class="form-control me-2"
                                   placeholder="Enter Value">
                            <button type="button"
                                    class="btn btn-danger btn-sm"
                                    onclick="removeRow(this)">
                                X
                            </button>
                        </div>
                    </div>

                    <button type="button"
                            onclick="addValue()"
                            class="btn btn-secondary btn-sm mt-2">
                        + Add More
                    </button>
                </div>

                <button type="submit" class="btn btn-primary">
                    Save Attribute
                </button>

            </form>

        </div>
    </div>

</div>

<script>
function addValue(){
    let wrapper = document.getElementById('values-wrapper');

    let html = `
        <div class="d-flex mb-2">
            <input type="text"
                   name="values[]"
                   class="form-control me-2"
                   placeholder="Enter Value">
            <button type="button"
                    class="btn btn-danger btn-sm"
                    onclick="removeRow(this)">
                X
            </button>
        </div>
    `;

    wrapper.insertAdjacentHTML('beforeend', html);
}

function removeRow(button){
    button.closest('.d-flex').remove();
}
</script>

