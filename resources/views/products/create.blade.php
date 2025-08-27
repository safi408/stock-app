@extends('layouts.masterlayout')

@section('title', 'Add Product')

@section('content')
<div class="container-fluid py-4 px-0"> {{-- ✅ Removed left/right padding --}}
    <div class="row g-0"> {{-- ✅ Removed gutter spacing --}}
        <div class="col-12"> {{-- ✅ Full-width column --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm mx-3" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm border-0 rounded-0 mx-3"> {{-- Optional: rounded-0 for edge-to-edge --}}
                <div class="card-header bg-primary text-white rounded-0">
                    <h4 class="mb-0">
                        <i class="bi bi-plus-circle-dotted me-2"></i> Add New Product
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                        @csrf

                        {{-- Brand --}}
                        <div class="col-md-6">
                            <label for="brand_id" class="form-label">
                                <i class="bi bi-diagram-3-fill me-1"></i> Brand <span class="text-danger">*</span>
                            </label>
                            <select name="brand_id" id="brand_id" class="form-select">
                                <option value="">Select Brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Product Name --}}
                        <div class="col-md-6">
                            <label for="name" class="form-label">
                                <i class="bi bi-tag-fill me-1"></i> Product Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="e.g. iPhone 14">
                            @error('name')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div class="col-12">
                            <label for="description" class="form-label">
                                <i class="bi bi-card-text me-1"></i> Description
                            </label>
                            <textarea name="description" id="summernote" class="form-control" rows="4" placeholder="Enter product description"></textarea>
                            @error('description')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Price --}}
                        <div class="col-md-6">
                            <label for="price" class="form-label">
                                <i class="bi bi-currency-dollar me-1"></i> Price <span class="text-danger">*</span>
                            </label>
                            <input type="number" name="price" id="price" step="0.01" class="form-control" placeholder="e.g. 999.99">
                            @error('price')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Stock --}}
                        <div class="col-md-6">
                            <label for="stock" class="form-label">
                                <i class="bi bi-boxes me-1"></i> Stock Quantity
                            </label>
                            <input type="number" name="stock" id="stock" class="form-control" placeholder="e.g. 50">
                            @error('stock')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Image Upload --}}
                        <div class="col-md-12">
                            <label for="image" class="form-label">
                                <i class="bi bi-image-fill me-1"></i> Product Image
                            </label>
                            <input type="file" name="image" id="image" class="form-control">
                            @error('image')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Submit --}}
                        <div class="col-12 text-end pt-2">
                            <button type="submit" class="btn btn-success px-4">
                                <i class="bi bi-check2-circle me-1"></i> Save Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Summernote Init -->
<script>
    $(document).ready(function () {
        $('#summernote').summernote({
            height: 200,
            placeholder: 'Write product description here...',
            toolbar: [
                ['style', ['style']],
                ['font', ['fontname', 'fontsize', 'bold', 'italic', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture']],
                ['view', ['fullscreen', 'codeview']]
            ],
            fontNames: [
                'Arial', 'Arial Black', 'Comic Sans MS', 'Courier New',
                'Merriweather', 'Open Sans', 'Roboto', 'Times New Roman', 'Verdana'
            ],
            fontNamesIgnoreCheck: ['Merriweather', 'Open Sans', 'Roboto']
        });
    });
</script>
@endsection
