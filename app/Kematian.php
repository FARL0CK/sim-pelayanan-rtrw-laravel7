<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kematian extends Model
{
    protected $table = 'kematian';
    protected $fillable = ['nama', 'nik', 'jenis_kelamin', 'tanggal_lahir', 'tanggal_kematian', 'tempat_kematian', 'penyebab_kematian'];
}
