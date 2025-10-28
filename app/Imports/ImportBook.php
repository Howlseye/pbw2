<?php

namespace App\Imports;

use App\Models\Buku;
use App\Models\Category;
use App\Models\Penerbit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportBook implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $category = Category::where('name', $row['kategori'])->first();
        $penerbit = Penerbit::where('namaPenerbit', $row['penerbit'])->first();

        return new Buku([
            'judul' => $row['judul'],
            'penulis' => $row['penulis'],
            'sampul' => null,
            'category_id' => $category ? $category->id : null,
            'penerbit_id' => $penerbit ? $penerbit->id : null,
        ]);
    }
}
