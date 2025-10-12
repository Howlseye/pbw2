<x-layout>
    <div class="container">
        <div class="row p-lg-3">
            <div class="col">
                <form method="POST" action="{{ route('mahasiswa.store') }}">
                    @csrf
                    <h1>Registrasi Mahasiswa</h1>
                    
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="number" class="form-control" value="{{ old('nim') }}" id="nim" name="nim"
                            pattern="\d{5,12}" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" value="{{ old('nama') }}" id="nama" name="nama"
                            minlength="3" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" value="{{ old('email') }}" id="email" name="email"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" minlength="6"
                            required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>