<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Iuran extends Model
{
    public function pembayaranIuran(){
        return $this->hasMany('App\Models\PembayaranIuran');
    }
}
