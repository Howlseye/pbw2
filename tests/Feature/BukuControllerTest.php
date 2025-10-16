<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Models\Buku;
use Tests\TestCase;

class BukuControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store(){
        Storage::fake('public');

        $file = UploadedFile::fake()->image('cover.jpg');

        $response = $this->post('/buku', [
            'judul' => 'Judul Test',
            'penulis' => 'Penulis Test',
            'kategori' => 'Kategori Test',
            'sampul' => $file,
        ]);

        Storage::disk('public')->assertExists('sampul-buku/' . $file->hashName());

        $this->assertDatabaseHas('bukus', [
            'judul' => 'Judul Test',
            'penulis' => 'Penulis Test',
            'kategori' => 'Kategori Test',
        ]);

        $response->assertRedirect('/buku');
    }

    public function test_update(){
        Storage::fake('public');

        $buku = Buku::factory()->create([
            'judul' => 'Judul Lama',
            'penulis' => 'Penulis Lama',
            'kategori' => 'Kategori Lama',
            'sampul' => 'sampul-lama.jpg',
        ]);

        $newFile = UploadedFile::fake()->image('new-cover.jpg');

        $response = $this->put("/buku/". $buku->id, [
            'judul' => 'Judul Baru',
            'penulis' => 'Penulis Baru',
            'kategori' => 'Kategori Baru',
            'sampul' => $newFile,
            'sampulLama' => 'sampul-lama.jpg',
        ]);

        Storage::disk('public')->assertExists('sampul-buku/' . $newFile->hashName());
        Storage::disk('public')->assertMissing('sampul-lama.jpg');

        $this->assertDatabaseHas('bukus', [
            'id' => $buku->id,
            'judul' => 'Judul Baru',
            'penulis' => 'Penulis Baru',
            'kategori' => 'Kategori Baru',
            'sampul' => 'sampul-buku/' . $newFile->hashName(),
        ]);

        $response->assertRedirect('/buku');
    }

    public function test_destroy(){
        Storage::fake('public');

        $buku = Buku::factory()->create([
            'sampul' => 'sampul-buku/sampul.jpg'
        ]);

        $response = $this->delete("/buku/". $buku->id);

        Storage::disk('public')->assertMissing('sampul-buku/sampul.jpg');

        $this->assertDatabaseMissing('bukus', [
            'id' => $buku->id,
        ]);

        $response->assertRedirect('/buku');
    }
}
