<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Bus;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function bukus(){
        return $this->hasMany(Buku::class);
    }
}
