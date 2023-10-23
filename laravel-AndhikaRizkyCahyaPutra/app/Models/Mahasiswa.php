<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    //Jika nama table berbeda
    protected $table = 'mahasiswas';

    // fillable adalah array yang berisi index index yang mewakili kolom apa saja yang bolebh di isikan
    protected $fillable = ['npm','nama','tempat_lahir','tanggal_lahir'];
    //untuk mengatur kolom yang tidak boleh di isi
    protected $guarded = [];
}
