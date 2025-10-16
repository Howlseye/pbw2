<x-layout>
    <div class="container mt-5">
        <h1>Edit Penerbit</h1>
        <form action="{{ route('penerbit.update', $penerbit->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="namaPenerbit" class="form-label">Nama Penerbit</label>
                <input type="text" name="namaPenerbit" class="form-control" value="{{ old('namaPenerbit', $penerbit->namaPenerbit) }}">
                @error('namaPenerbit')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-2">Simpan</button>
        </form>
    </div>
</x-layout>