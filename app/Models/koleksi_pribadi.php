<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class koleksi_pribadi extends Model
{
    use HasFactory;
    protected $table = "koleksi_pribadis"; // TABEL YANG TERKAIT DENGAN MODEL
    protected $guarded = ['id']; // MENGATUR HANYA COLUMN ID YANG TIDAK BOLEH DI ISI

    /*-------RELASI ANTAR TABLE--------- */
    // RELASI DARI MODEL USER KE KOLEKSI PRIBADI
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // RELASI DARI MODEL BUKU KE KOLEKSI PRIBADI
    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}
