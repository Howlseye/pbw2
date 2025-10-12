<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function create()
    {
        return view('admin.dashboard');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|min:3',
            'nim' => 'required|digits_between:5,12',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $mahasiswa = session('mahasiswa', []);
        $mahasiswa[] = $validated;
        session(['mahasiswa' => $mahasiswa]);

        return redirect()->route('mahasiswa.index');
    }

    public function index()
    {
        $mahasiswa = session('mahasiswa', []);
        return view('mahasiswa.index', compact('mahasiswa'));
    }
    public function destroy($index)
    {
        $mahasiswa = session('mahasiswa', []);

        if (isset($mahasiswa[$index])) {
            unset($mahasiswa[$index]);
            session(['mahasiswa' => array_values($mahasiswa)]); // reset index
        }

        return redirect()->route('mahasiswa.index');
    }
}