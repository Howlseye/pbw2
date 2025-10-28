<x-layout>
    <div class="container mt-5">
        <div class="card">
            <h3 class="card-header bg-primary text-white">Daftar Buku</h3>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <a href="/buku/create" class="btn btn-primary">Tambah Buku</a>
                    <div>
                        <a href="{{ route('buku.export') }}" class="btn btn-success">Export</a>
                        <form id="import-form" action="{{ route('buku.import') }}" method="POST" enctype="multipart/form-data" class="d-inline">
                            @csrf
                            <button class="btn btn-warning">Import</button>
                            <input type="file" name="file" class="form-control d-inline pb-2" style="width: auto;" required>
                        </form>
                    </div>
                </div>
                <table class="table table-bordered table-striped table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Kategori</th>
                            <th>Penerbit</th>
                            <th>Sampul</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($bukus as $buku)
                        <tr class="text-center">
                            <td class="text-center align-middle">{{ $loop->iteration }}</td>
                            <td class="text-center align-middle">{{ $buku->judul }}</td>
                            <td class="text-center align-middle">{{ $buku->penulis }}</td>
                            <td class="text-center align-middle">{{ $buku->category->name ?? '-' }}</td>
                            <td class="text-center align-middle">{{ $buku->penerbit->namaPenerbit ?? '-' }}</td>
                            <td>
                                <img src="storage/{{ $buku->sampul ?? 'sampul-buku/null.png' }}" class="rounded img-fluid" width="100px">
                            </td>
                            <td class="text-center align-middle">
                                <a class="btn btn-warning" href="/buku/{{ $buku->id }}/edit">Ubah</a>
                                <form action="/buku/{{ $buku->id }}" method="post" class="d-inline ms-1">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" onclick="return confirm('Hapus Buku ' + '{{ $buku->judul }}' + ' ?')" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const importForm = document.getElementById('import-form');
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            importForm.addEventListener('submit', async function(event) {
                event.preventDefault();
                const formData = new FormData(importForm);
                const response = await fetch(importForm.getAttribute('action'), {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: formData
                });
                const result = await response.json();
                if (response.ok) {
                    toastr.success(result.message);
                    location.reload();
                } else {
                    toastr.error('Impor Gagal');
                }
                importForm.reset();
            });
        });
    </script>
</x-layout>