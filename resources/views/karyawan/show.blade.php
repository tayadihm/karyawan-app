<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Karyawan App</title>
  </head>
  <body>

    <div class="container" style="width: 50%">
        <div class="row">
            <div class="col">
                <a href="{{ route('karyawan.index') }}" class="btn btn-sm btn-dark mb-3 mt-5">Kembali</a>
                <table class="table table-bordered">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col" class="col-sm-3">Field</th>
                            <th scope="col">Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Nama</th>
                            <td>{{ $karyawan->nama }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Jenis Kelamin</th>
                            <td>{{ $karyawan->j_kelamin }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nomor HP</th>
                            <td>{{ $karyawan->no_handphone }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Email Aktif</th>
                            <td>{{ $karyawan->email }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Current Salary</th>
                            <td>{{ $karyawan->current_salary }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Foto Profil</th>
                            <td>
                                <img src="{{ asset('fotokaryawan/'.$karyawan->foto) }}" alt="foto karyawan" width="80px">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('karyawan.export', $karyawan) }}" class="btn btn-md btn-primary mb-3">Export Word</a>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>