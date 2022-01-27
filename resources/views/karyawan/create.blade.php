<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Karyawan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">

                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
                @endif

                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <h2>Tambah Karyawan</h2><br>
                        <form action="{{ route('karyawan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="nama">Nama Karyawan</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="j_kelamin">Jenis Kelamin</label>
                                <select name="j_kelamin" class="form-control" required>
                                    <option selected>Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="no_handphone">Nomor Handphone</label>
                                <input type="number" class="form-control @error('no_handphone') is-invalid @enderror" name="no_handphone" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">Email Aktif</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="current_salary">Current Salary</label>
                                <input type="number" class="form-control @error('current_salary') is-invalid @enderror" name="current_salary" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="foto">Upload Foto</label>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" required>
                            </div>

                            <br>

                            <button type="submit" class="btn btn-md btn-primary">Tambah</button>
                            <a href="{{ route('karyawan.index') }}" class="btn btn-md btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.min.js" integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>