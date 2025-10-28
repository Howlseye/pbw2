<?php

namespace App\Exports;

use App\Models\Buku;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportBook implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Buku::with('category', 'penerbit')->get()->map(function ($buku) {
            return [
                'id' => $buku->id,
                'judul' => $buku->judul,
                'penulis' => $buku->penulis,
                'penerbit' => $buku->penerbit->namaPenerbit ?? 'N/A',
                'kategori' => $buku->category->name ?? 'N/A',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID Buku',
            'Judul',
            'Penulis',
            'Penerbit',
            'Kategori'
        ];
    }
}
