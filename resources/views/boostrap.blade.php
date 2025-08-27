<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Navbar Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="#">MyStore</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <!-- Home -->
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>


            <li class="nav-item">
               <a class="nav-link" href="{{route('all.product')}}">All Product</a>
            </li>
               
      <!-- Brands Dropdown -->
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button" data-bs-toggle="dropdown">
        Products
    </a>
    <ul class="dropdown-menu" aria-labelledby="productsDropdown">
        @foreach (App\Models\Product::with('brand')->get() as $product)
            <li>
                <a class="dropdown-item" href="{{route('brand.products',$product->id)}}">
                    {{ $product->name }} 
                    @if($product->brand)
                        <small class="text-muted">({{ $product->brand->name }})</small>
                    @endif
                </a>
            </li>
        @endforeach
    </ul>
</li>



        
   



            <!-- Pages Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown">
                    Pages
                </a>
                <ul class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <li><a class="dropdown-item" href="#">About</a></li>
                    <li><a class="dropdown-item" href="#">Contact</a></li>
                    <li><a class="dropdown-item" href="#">Services</a></li>
                </ul>
            </li>
        </ul>

        <!-- Right Side (Login/Register) -->
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Register</a></li>
        </ul>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
