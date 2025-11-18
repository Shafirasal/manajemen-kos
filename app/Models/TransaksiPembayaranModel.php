<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiPembayaranModel extends Model
{
    //



        public function transaksiSewa()
    {
        return $this->belongsTo(TransaksiSewaModel::class, 'id_transaksi_sewa', 'id_transaksi_sewa');
    }
}
