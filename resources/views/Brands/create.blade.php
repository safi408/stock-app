@extends('layouts.masterlayout')

@section('content')
<div class="container py-4">
    <div class="row g-4">

        @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


        <!-- Brand Create Form -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white fw-semibold">
                    <i class="bi bi-plus-circle me-1"></i> Create New Brand
                </div>
                <div class="card-body">
                    <form action="{{route('brand.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Brand Name</label>
                            <input type="text" name="name" id="name" class="form-control shadow-sm">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success w-100">
                            <i class="bi bi-save me-1"></i> Save Brand
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Brand List Table -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-secondary text-white fw-semibold">
                    <i class="bi bi-card-list me-1"></i> All Brands
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Brand Name</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($brands as $brand)
                                   <tr>
                                     <td>{{$brand->id}}</td>
                                     <td>{{$brand->name}}</td> 
                                          <td class="text-end">
                                        <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></button>
                                        <a href="{{route('brand.delete',$brand->id)}}" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></a>
                                    </td> 
                                  </tr>  
                                 @endforeach
                                <!-- More rows will go here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
