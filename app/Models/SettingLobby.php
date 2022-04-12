<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingLobby extends Model
{
    protected $table = 'tbl_saklar';

    protected $fillable = [
        'id','id_admin','nm_saklar','nilai_saklar','kategori','lantai','tgl_saklar','jam_saklar'
        ];
}