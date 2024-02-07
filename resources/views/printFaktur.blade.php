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
        <div id="wrapper" class="border border-1 rounded-4 p-5 w-100 bg-light-subtle">
            <h1 class="text-center mb-2 fw-bold">Print Faktur</h1>
            <hr>
            <form method="POST" action="{{ route('storeFaktur') }}">
                @csrf
                <div class="mb-3">
                    <label for="nomorInvoice" class="form-label">Nomor invoice</label>
                    <input type="text" class="form-control bg-body-secondary" name="nomorInvoice"
                        value="<?php echo rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9); ?>" readonly>
                </div>

                <div class="my-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-primary text-center align-middle">
                                <th scope="col">ID</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($carts as $cart)
                                <tr>
                                    <th scope="row">
                                        <input type="" class="form-control border border-0 fw-bold text-center"
                                            name="barangId[]" value="{{ $cart->barangId }}" readonly>
                                    </th>
                                    <td>
                                        <input type="text" class="form-control bg-body-secondary"
                                            name="kategoriBarang[]" value="{{ $cart->kategoriBarang }}" readonly>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control  bg-body-secondary"
                                            name="namaBarang[]" value="{{ $cart->namaBarang }}" readonly>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control  bg-body-secondary"
                                            name="jumlahBarang[]" value="{{ $cart->jumlahBarang }}" readonly>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control  bg-body-secondary" name="subTotal[]"
                                            value="<?php echo $cart->jumlahBarang * $cart->hargaBarang; ?>" readonly>
                                    </td>
                                    <td>
            </form>
            <form action="{{ route('deleteBarangFaktur', ['id' => $cart->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger">Remove</button>
            </form>
            </td>
            </tr>
        @empty
            <tr class="text-center">
                <th scope="row">-</th>
                <td colspan="5">No data</td>
            </tr>
            @endforelse
            <tr class="text-center align-middle">
                <th colspan="4" class="bg-body-tertiary">TOTAL</th>
                <td colspan="2" class="bg-body-tertiary">
                    <?php
                    $sum = 0;
                    
                    foreach ($carts as $cart) {
                        $sum += $cart->subTotal;
                    }
                    
                    echo 'Rp.' . $sum;
                    ?>
                </td>
            </tr>
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
