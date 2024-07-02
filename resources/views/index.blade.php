<!DOCTYPE html>
<html>
<head>
    <title>Tutorial Membuat Pencarian Pada Laravel - www.malasngoding.com</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2><a href="https://www.malasngoding.com">www.malasngoding.com</a></h2>
        <h3>Data Pegawai</h3>

        <p>Cari Data Pegawai :</p>
        <form action="/pegawai/cari" method="GET" class="form-inline mb-4">
            <input type="text" name="cari" placeholder="Cari Pegawai .." value="{{ old('cari') }}" class="form-control mr-2">
            <input type="submit" value="CARI" class="btn btn-primary">
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Umur</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pegawai as $p)
                <tr>
                    <td>{{ $p->pegawai_nama }}</td>
                    <td>{{ $p->pegawai_jabatan }}</td>
                    <td>{{ $p->pegawai_umur }}</td>
                    <td>{{ $p->pegawai_alamat }}</td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="/pegawai/edit/{{ $p->pegawai_id }}">Edit</a>
                        <a class="btn btn-danger btn-sm" href="/pegawai/hapus/{{ $p->pegawai_id }}">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            Halaman : {{ $pegawai->currentPage() }} <br/>
            Jumlah Data : {{ $pegawai->total() }} <br/>
            Data Per Halaman : {{ $pegawai->perPage() }} <br/>
        </div>

        <div class="d-flex justify-content-center mt-3">
            {{ $pegawai->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
