<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyewaModel extends Model
{
    use HasFactory;

    protected $table = 't_penyewa';
    protected $primaryKey = 'id_penyewa';

    public $timestamps = true;

    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
        'jenis_kelamin'
    ];

    public function transaksi()
{
    return $this->hasMany(TransaksiModel::class, 'id_penyewa');
}

}
