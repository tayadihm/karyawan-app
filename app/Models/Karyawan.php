<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawans';
    protected $fillable = [
        'nama',
        'j_kelamin',
        'no_handphone',
        'email',
        'current_salary',
        'foto'
    ];
}
