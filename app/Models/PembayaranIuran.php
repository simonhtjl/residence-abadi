<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembayaranIuran extends Model
{
    public function Iuran(){
        return $this->belongsTo('App\Models\Iuran');
    }

    protected $fillable = [
        'iuran_id','pemilikrumah','jumlah','bulan','status','buktipembayaran'
        ];
}
