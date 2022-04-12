<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalDevice extends Model
{
    protected $table = 'tbljadwal_device';
    protected $primaryKey = 'id_jadwal';
    public $timestamps = false;

    protected $fillable = [
        'id_jadwal','id_admin','saklar_id','nilai','tgl_jadwal','jam_jadwal'
        ];
    
    protected $guarded = ['id_jadwal'];

    public function saklar(){
        return $this->hasMany('App\Models\Saklar');
    }
}
