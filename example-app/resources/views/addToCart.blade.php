<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>

<body>
    <div class="container-lg d-flex justify-content-center align-items-center vh-100 bg-light">
        <div id="wrapper" class="border border-1 rounded-4 p-5 w-50 bg-light-subtle">
            <h1 class="text-center mb-2 fw-bold">Add to Cart</h1>
            <hr>
            <form method="POST" action="{{ route('storeToCart', ['id' => $product->id]) }}">
                @csrf

                <ol class="list-group list-group-numbered mt-4 mb-3">
                    <li class="list-group-item d-flex justify-content-between align-items-start p-3">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Kategori barang</div>
                            <input type="text" class="form-control mt-2 bg-body-secondary" name="kategoriBarang" value="{{$product->kategoriBarang}}" readonly>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start p-3">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Nama barang</div>
                            <input type="text" class="form-control mt-2 bg-body-secondary" name="namaBarang" value="{{$product->namaBarang}}" readonly>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start p-3">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Harga barang</div>
                            <input type="number" class="form-control mt-2 bg-body-secondary" name="hargaBarang" value="{{$product->hargaBarang}}" readonly>
                        </div>
                    </li>
                </ol>

                <div class="mb-5">
                    <label for="jumlahBarang" class="form-label">Jumlah barang</label>
                    <input type="number" class="form-control" name="jumlahBarang" value="1" min="1" max="{{$product->jumlahBarang}}">
                    @error('jumlahBarang')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-center gap-2">
                    <a href="{{ route('viewBarang') }}" class="btn btn-outline-danger w-50">Cancel</a>
                    <button type="submit" class="btn btn-primary w-50">Add</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
