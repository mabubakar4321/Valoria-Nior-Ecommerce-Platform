@extends('Admin.Dashbaord.layout')

@section('content')
<div class="main-content">

    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">All Products</h4>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                + Create Product
            </a>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Created</th>
                            <th width="180">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($products as $key => $product)
                        <tr>
                            <td>{{ $key+1 }}</td>

                            {{-- Product Image --}}
                            <td>
                                @if($product->images->first())
                                    <img src="{{ asset('storage/'.$product->images->first()->image) }}"
                                         width="60"
                                         height="60"
                                         style="object-fit:cover; border-radius:8px;">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>

                            {{-- Name --}}
                            <td>
                                <strong>{{ $product->name }}</strong>
                                <br>
                                <small class="text-muted">SKU: {{ $product->sku }}</small>
                            </td>

                            {{-- Category --}}
                            <td>
                                {{ $product->category->title ?? '-' }}
                            </td>

                            {{-- Price --}}
                            <td>
                                @if($product->discount_price)
                                    <span class="text-muted text-decoration-line-through">
                                        {{ number_format($product->original_price,2) }}
                                    </span>
                                    <br>
                                    <strong class="text-success">
                                        {{ number_format($product->discount_price,2) }}
                                    </strong>
                                @else
                                    <strong>
                                        {{ number_format($product->original_price,2) }}
                                    </strong>
                                @endif
                            </td>

                            {{-- Quantity --}}
                            <td>
                                @if($product->quantity > 0)
                                    <span class="badge bg-success">
                                        {{ $product->quantity }}
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        Out of Stock
                                    </span>
                                @endif
                            </td>

                            {{-- Created --}}
                            <td>
                                {{ $product->created_at->format('d M Y') }}
                            </td>

                            {{-- Actions --}}
                            <td>
                                <a href="{{ route('admin.products.show',$product->id) }}"
                                   class="btn btn-sm btn-info">
                                    View
                                </a>

                                <a href="{{ route('admin.products.edit',$product->id) }}"
                                   class="btn btn-sm btn-dark">
                                    Edit
                                </a>

                                <form action="{{ route('admin.products.destroy',$product->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Delete this product?')">
                                        Delete
                                    </button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>
