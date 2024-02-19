<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ulasan_buku extends Model
{
    use HasFactory;
    protected $table = "ulasan_bukus"; // TABEL YANG TERKAIT DENGAN MODEL
    protected $guarded = ['id']; // MENGATUR HANYA COLUMN ID YANG TIDAK BOLEH DI ISI

    /*-------RELASI ANTAR TABLE--------- */
    // RELASI DARI MODEL USER KE ULASAN BUKU
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // RELASI DARI MODEL BUKU KE ULASAN BUKU
    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}
