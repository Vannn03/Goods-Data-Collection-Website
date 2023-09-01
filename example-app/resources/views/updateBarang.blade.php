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
            <h1 class="text-center mb-2 fw-bold">Update Barang</h1>
            <form method="POST" action="{{ route('updateBarang', ['id' => $product->id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="kategoriBarang" class="form-label">Kategori barang</label>
                    <input type="text" class="form-control" name="kategoriBarang"
                        value="{{ $product->kategoriBarang }}" disabled>
                </div>

                <div class="mb-3">
                    <label for="namaBarang" class="form-label">Nama barang</label>
                    <input type="text" class="form-control" name="namaBarang" value="{{ $product->namaBarang }}" disabled>
                </div>

                <div class="mb-3">
                    <label for="hargaBarang" class="form-label">Harga barang</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control" name="hargaBarang"
                            value="{{ $product->hargaBarang }}">
                    </div>
                    @error('hargaBarang')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jumlahBarang" class="form-label">Jumlah barang</label>
                    <input type="number" class="form-control" name="jumlahBarang" value="{{ $product->jumlahBarang }}">
                    @error('jumlahBarang')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="fotoBarang" class="form-label">Foto barang</label>
                    <input type="file" class="form-control" name="fotoBarang" value="{{ URL::asset('/products/'.$product->fotoBarang) }}">
                    @error('fotoBarang')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-center gap-2">
                    <a href="{{ route('viewBarang') }}" class="btn btn-outline-danger w-50">Cancel</a>
                    <button type="submit" class="btn btn-primary w-50">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
