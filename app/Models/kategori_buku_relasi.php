<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori_buku_relasi extends Model
{
    use HasFactory;
    protected $table = "kategoribuku_relasis"; // TABEL YANG TERKAIT DENGAN MODEL
    protected $guarded = ['id']; // MENGATUR HANYA COLUMN ID YANG TIDAK BOLEH DI ISI

    /*-------RELASI ANTAR TABLE--------- */
    // RELASI DARI MODEL BUKU KE KATEGORI BUKU RELASI
    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
    // RELASI DARI MODEL KATEGORI BUKU KE KATEGORI BUKU RELASI
    public function kategori()
    {
        return $this->belongsTo(KategoriBuku::class);
    }
}
