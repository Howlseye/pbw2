<x-layout>
    <div class="container mt-4">
        <h2>Daftar Mahasiswa</h2>

        @if(count($mahasiswa) > 0)
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mahasiswa as $index => $mhs)
                        <tr>
                            <td>{{ $mhs['nim'] }}</td>
                            <td>{{ $mhs['nama'] }}</td>
                            <td>{{ $mhs['email'] }}</td>
                            <td>
                                <form action="{{ route('mahasiswa.destroy', $index) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-warning mt-3">
                Belum ada data.
            </div>
        @endif

        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mt-4">Tambah Mahasiswa</a>
    </div>
</x-layout>