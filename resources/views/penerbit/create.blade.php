<x-layout>
    <div class="container mt-5">
        <h1>Tambah Penerbit</h1>
        <form action="{{ route('penerbit.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="namaPenerbit" class="form-label">Nama Penerbit</label>
                <input type="text" name="namaPenerbit" class="form-control" value="{{ old('namaPenerbit') }}">
                @error('namaPenerbit')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-2">Simpan</button>
        </form>
    </div>
</x-layout>