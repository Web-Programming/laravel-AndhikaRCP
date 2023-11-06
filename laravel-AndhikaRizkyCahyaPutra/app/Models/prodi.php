<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prodi extends Model
{
    use HasFactory;
    public function mahasiswas()
    {
        return $this->hasMany("App\Models\Mahasiswa");
    }
}
