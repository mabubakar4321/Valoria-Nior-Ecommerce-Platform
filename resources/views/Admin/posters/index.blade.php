@extends('Admin.Dashbaord.layout')

@section('content')
<div class="main-content">

{{-- <div class="asset-wrapper"> --}}

    <!-- Header -->
    <div class="asset-header">
        <div>
            <h1>Poster Library</h1>
            <p>Manage promotional visual assets</p>
        </div>

        <a href="{{ route('admin.posters.create') }}" class="btn-upload">
            Upload Poster
        </a>
    </div>

    @if(session('success'))
        <div class="alert-success-modern">
            {{ session('success') }}
        </div>
    @endif

    @php
        $grouped = $posters->groupBy('type');
    @endphp

    @foreach($grouped as $type => $items)

    <section class="asset-section">

        <div class="section-title">
            <h2>{{ ucfirst(str_replace('_',' ',$type)) }}</h2>
            <span>{{ $items->count() }}</span>
        </div>

        <div class="asset-grid">

            @foreach($items as $poster)

            <div class="asset-item">

                <div class="image-box">
                    <img src="{{ asset('storage/'.$poster->image) }}" alt="Poster">
                </div>

                <div class="asset-actions">
                    <a href="{{ route('admin.posters.show',$poster->id) }}">View</a>
                    <a href="{{ route('admin.posters.edit',$poster->id) }}">Edit</a>

                    <form action="{{ route('admin.posters.destroy',$poster->id) }}"
                          method="POST"
                          onsubmit="return confirm('Delete this poster?')">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </div>

            </div>

            @endforeach

        </div>

    </section>

    @endforeach

</div>
</div>


<style>

/* Layout */
.asset-wrapper {
    padding: 60px 80px;
    background: #f3f4f6;
    min-height: 100vh;
}

/* Header */
.asset-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    margin-bottom: 60px;
}

.asset-header h1 {
    font-size: 34px;
    font-weight: 600;
    color: #111827;
}

.asset-header p {
    font-size: 14px;
    color: #6b7280;
    margin-top: 6px;
}

/* Button */
.btn-upload {
    background: #111827;
    color: #fff;
    padding: 10px 20px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 13px;
    transition: 0.3s ease;
}

.btn-upload:hover {
    background: #000;
}

/* Success */
.alert-success-modern {
    background: #e0f2fe;
    color: #0369a1;
    padding: 14px 18px;
    border-radius: 6px;
    margin-bottom: 40px;
}

/* Section */
.asset-section {
    margin-bottom: 70px;
}

.section-title {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

.section-title h2 {
    font-size: 20px;
    font-weight: 500;
    color: #111827;
}

.section-title span {
    font-size: 12px;
    color: #6b7280;
}

/* GRID */
.asset-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 30px;
}

/* ITEM */
.asset-item {
    background: #ffffff;
    border-radius: 8px;
    overflow: hidden;
    transition: 0.25s ease;
}

.asset-item:hover {
    box-shadow: 0 10px 35px rgba(0,0,0,0.08);
}

/* SAME IMAGE SIZE */
.image-box {
    width: 100%;
    height: 380px; /* SAME FIXED HEIGHT */
    overflow: hidden;
    background: #e5e7eb;
}

.image-box img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* IMPORTANT */
    display: block;
}

/* Actions */
.asset-actions {
    display: flex;
    justify-content: space-around;
    padding: 14px 0;
    border-top: 1px solid #f1f5f9;
}

.asset-actions a,
.asset-actions button {
    font-size: 13px;
    background: none;
    border: none;
    color: #374151;
    cursor: pointer;
    text-decoration: none;
    transition: 0.2s;
}

.asset-actions a:hover {
    color: #000;
}

.asset-actions button {
    color: #dc2626;
}

.asset-actions button:hover {
    color: #991b1b;
}

/* Responsive */
@media (max-width: 900px) {
    .asset-wrapper {
        padding: 40px;
    }
}

@media (max-width: 600px) {
    .asset-wrapper {
        padding: 30px 20px;
    }

    .asset-header {
        flex-direction: column;
        gap: 20px;
        align-items: flex-start;
    }

    .image-box {
        height: 300px;
    }
}

</style>

{{-- @endsection --}}