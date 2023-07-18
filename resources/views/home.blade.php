<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Skill FSWD - Arkatama</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h2>Form Input Pengguna</h2>

        @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
        @elseif (session('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('home.store') }}" method="POST">
            @csrf
            @method('POST')

            <div class="form-group mb-2">
                <label for="data">Data Pengguna:</label>
                <input type="text" class="form-control @error('data') is-invalid @enderror" id="data" name="data"
                    placeholder="Masukkan data" value="{{ old('data') }}" required>

                @error('data')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

                <small id="info-data" class="form-text text-muted">Contoh Format: CUT MINI 28 BANDA ACEH</small>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>

        <h2 class="mt-5">Data Pengguna</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Usia</th>
                    <th>Kota</th>
                    <th>Tanggal Input</th>
                </tr>
            </thead>
            <tbody id="userData">
                @foreach ($data as $profile)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $profile->name }}</td>
                    <td>{{ $profile->age }}</td>
                    <td>{{ $profile->city }}</td>
                    <td>{{ $profile->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>