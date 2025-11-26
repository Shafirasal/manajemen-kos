<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 't_user';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'id_penyewa',
        'id_pengelola',
        'username',
        'password',
        'role'
    ];

    protected $hidden = [
        'password'
    ];

    // USER → PENYEWA
    public function penyewa()
    {
        return $this->belongsTo(PenyewaModel::class, 'id_penyewa', 'id_penyewa');
    }

    // USER → PENGELOLA
    public function pengelola()
    {
        return $this->belongsTo(PengelolaModel::class, 'id_pengelola', 'id_pemilik');
    }
}
