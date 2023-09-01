<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>

<body>
    <div class="container-lg d-flex justify-content-center align-items-center vh-100 bg-light">
        <div id="wrapper" class="border border-1 rounded-4 p-5 w-50 bg-light-subtle">
            <h1 class="text-center mb-2 fw-bold">Print Faktur</h1>
            <hr>
            <form method="POST" action="{{ route('storeFaktur') }}">
                @csrf
                <div class="mb-3">
                    <label for="nomorInvoice" class="form-label">Nomor invoice</label>
                    <input type="text" class="form-control" name="nomorInvoice" value="<?php echo rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9); ?>" disabled>
                </div>

                <div class="my-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-primary text-center">
                                <th scope="col">ID</th>
                                <th scope="col" class="w-50">Kategori</th>
                                <th scope="col" class="w-25">Nama</th>
                                <th scope="col" class="w-25">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $cart)
                                <tr>
                                    <th scope="row">{{ $cart->id }}</th>
                                    <td>{{ $cart->kategoriBarang }}</td>
                                    <td>{{ $cart->namaBarang }}</td>
                                    <td>
                                        <input type="number" class="form-control" name="jumlahBarang"
                                            value="1">
                                        @error('jumlahBarang')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mb-3">
                    <label for="alamatPengiriman" class="form-label">Alamat pengiriman</label>
                    <input type="text" class="form-control" name="alamatPengiriman">
                    @error('alamatPengiriman')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="kodePos" class="form-label">Kode pos</label>
                    <input type="text" class="form-control" name="kodePos">
                    @error('kodePos')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-center gap-2">
                    <a href="{{ route('viewBarang') }}" class="btn btn-outline-danger w-50">Cancel</a>
                    <button type="submit" class="btn btn-primary w-50">Save</button>
                </div>
        </div>
        </form>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
