<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'nama',
        'foto',
    ];

    public function files(){
        return $this->hasOne(File::class, 'id_pelanggan');
    }

    public function transaksi(){
        return $this->hasOne(transaksi::class, 'id_pelanggan');
    }
}
