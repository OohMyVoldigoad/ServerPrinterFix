<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileInfo extends Model
{
    use HasFactory;

    protected $table = 'files';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_pelanggan',
        'id_karyawan',
        'name',
        'file_path',
    ];

    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}
