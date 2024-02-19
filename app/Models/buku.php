<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;
    protected $table = "bukus"; // TABEL YANG TERKAIT DENGAN MODEL
    protected $guarded = ['id']; // MENGATUR HANYA COLUMN ID YANG TIDAK BOLEH DI ISI

    /*-------RELASI ANTAR TABLE--------- */
    // RELASI DARI MODEL BUKU KE ULASAN BUKU
    public function ulasanbuku()
    {
        return $this->hasMany(UlasanBuku::class);
    }
     // RELASI DARI MODEL BUKU KE KOLEKSI PRIBADI
    public function koleksipribadi()
    {
        return $this->hasMany(KoleksiPribadi::class);
    }
     // RELASI DARI MODEL BUKU KE KATEGORI BUKU RELASI
    public function kategoribuku_relasi()
    {
        return $this->hasMany(KategoriBuku_Relasi::class);
    }
     // RELASI DARI MODEL BUKU KE PEMINJAMAN
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
