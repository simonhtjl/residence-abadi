<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saklar extends Model
{
    protected $table = 'tbl_saklar';
    protected $primaryKey = 'saklar_id';
    public $timestamps = false;

    protected $fillable = [
        'saklar_id','id_admin','nm_saklar','nilai_saklar','kategori','lantai','tgl_saklar','jam_saklar'
        ];
    
    protected $guarded = ['saklar_id'];

    public function jadwaldevice(){
        return $this->belongsTo('App\Models\JadwalDevice');
    }
}
