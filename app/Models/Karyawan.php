<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'nama',
        'foto',
    ];

    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }

    public function transaksi(){
        return $this->hasOne(transaksi::class, 'id_pelanggan');
    }
}
