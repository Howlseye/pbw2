<x-layout>
    <div class="container mt-5">
        <div class="card shadow">
            <h3 class="card-header">Daftar Penerbit</h3>
            <div class="card-body">
                <a href="{{ route('penerbit.create') }}" class="btn btn-primary mb-3">Tambah Penerbit</a>
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nama Penerbit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penerbits as $penerbit)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $penerbit->namaPenerbit }}</td>
                                <td>
                                    <a href="{{ route('penerbit.edit', $penerbit->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('penerbit.destroy', $penerbit->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus penerbit ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if ($penerbits->isEmpty())
                            <tr>
                                <td colspan="3" class="text-center text-muted mt-3">Belum ada penerbit.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>