<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriGuru extends Model
{
    use HasFactory;

    protected $table = 'kategori_guru'; // Menegaskan nama tabel di database
    protected $fillable = ['nama_kategori'];
}