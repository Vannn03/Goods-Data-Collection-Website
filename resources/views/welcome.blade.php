<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body class="bg-light-subtle">
    <nav class="navbar navbar-expand-lg bg-body-secondary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PT Meksiko</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @can('is_admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('addKategori') }}">Add kategori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('addBarang') }}">Add barang</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('printFaktur') }}">Print faktur</a>
                        </li>
                    @endcan
                </ul>
                <div class="d-flex">
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-outline-danger" type="submit">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-success">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="d-flex m-5 gap-3">
        @foreach ($products as $product)
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('/storage/products/' . $product->fotoBarang) }}" class="card-img-top h-100"
                    alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->namaBarang }}</h5>
                    <p class="card-text fw-medium opacity-50">{{ $product->kategoriBarang }}</p>

                    <div class="d-flex flex-column border-bottom border-1">
                        <div class="d-flex justify-content-between">
                            <p class="card-text fw-normal">{{ $product->jumlahBarang }} barang</p>
                            <p class="card-text fw-medium opacity-75">Rp.{{ $product->hargaBarang }}</p>
                        </div>
                        @if ($product->jumlahBarang == 0)
                            <div class="alert alert-danger">
                                <h6>Barang sudah habis!</h6>
                                Sedang di re-stock...
                            </div>
                        @endif
                    </div>

                    @can('is_admin')
                        <div class="mt-3 d-flex gap-2 justify-content-end">
                            <a href="{{ route('editBarang', ['id' => $product->id]) }}" class="btn btn-success">Edit</a>

                            <form action="{{ route('deleteBarang', ['id' => $product->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger">Remove</button>
                            </form>
                        </div>
                    @else
                        @if ($product->jumlahBarang == 0)
                            <div class="mt-3 d-flex gap-2 justify-content-end">
                                <a href="javascript:void(0)" class="btn disabled" disabled>Add to cart</a>
                            </div>
                        @else
                            <div class="mt-3 d-flex gap-2 justify-content-end">
                                <a href="{{route('addToCart', ['id' => $product->id])}}" class="btn btn-success">Add to cart</a>
                            </div>
                        @endif
                    @endcan
                </div>
            </div>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
