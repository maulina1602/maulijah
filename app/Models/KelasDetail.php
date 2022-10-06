<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelasdetail extends Model
{
    use HasFactory;

    protected $table = 'kelasdetail';
    protected $fillable = ['dosen_id','mahasiswa_id'];


    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'mahasiswa_id', 'id');
    }
    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'dosen_id', 'id');
    }

}
