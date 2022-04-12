<?php

namespace App\Http\Controllers;
use App\Models\Saklar;
use App\Models\Pengaduan;
use App\Models\User;
use App\Models\JadwalDevice;
use Auth;
use Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


use Illuminate\Http\Request;

class IotController extends Controller
{

    //==============================================================
        //Admin Setting Saklar
    //==============================================================
    public function settingLobby(){
        
        
        $settinglobby = Saklar::all();
        $notif = Pengaduan::where('status', '=', 'belumselesai')->get();
        $pengaduan = Pengaduan::all();
        $user = User::all();

        return view('admin.settinglobby',compact(['settinglobby','notif','pengaduan','user']));
    }

    public function tambahSaklar(Request $request){
        $saklar = new Saklar;
        $saklar->id_admin = $request->id_admin;
        $saklar->nm_saklar = $request->nm_saklar;
        $saklar->nilai_saklar = $request->nilai_saklar;
        $saklar->kategori = $request->kategori;
        $saklar->tgl_saklar = $request->tgl_saklar;
        $saklar->jam_saklar = $request->jam_saklar;
        $saklar->save();

        Alert::success('Sukses', 'Menambah nomor rumah');
        return redirect()->back();
        
    }
    public function updateSaklar(Request $request,$id){
        $saklar = Saklar::findOrFail($id);
        $saklar->nm_saklar = $request->input('nm_saklar');
        $saklar->save();

        Alert::success('Sukses', 'Merubah saklar');
        return redirect()->back();
        
    }
    public function hapusSaklar($id){

        Saklar::findOrFail($id)->delete();

        Alert::success('Sukses', 'Menghapus Saklar');
        return redirect()->back();
        
    }

    //==============================================================
        //User
    //==============================================================

    public function controlLobby(){
        $settinglobby = Saklar::all();

        return view('penduduk.controllobby',compact(['settinglobby']));
    }

    public function powerOnOff($id){


        $on = 1;
        $off = 0;
        $value = Saklar::findOrFail($id);
        
        if($value->nilai_saklar == 1){
            $value->nilai_saklar = 0;
        }elseif($value->nilai_saklar == 0){
            $value->nilai_saklar = 1;
        }
        $value->save();

        return redirect()->back();

    }

    public function updateLobby(Request $request,$id){
        $sl = settingLobby::findOrFail($id);
        $sl->nm_saklar = $request->input('nm_saklar');
        $sl->save();
        Alert::warning('Sukses', 'Merubah Nomor Rumah');
        return redirect()->back();
    }

    public function jadwalLobby(){
        $settinglobby = Saklar::all();
        $jadwaldevice = JadwalDevice::all();
        $nama = Saklar::where('id_admin','=',1);
        return view('penduduk.jadwallobby',compact(['settinglobby','jadwaldevice']));
        
    }
    public function tambahJadwal(Request $request){
        $jadwal = new JadwalDevice;
        $jadwal->senin = $request->senin;
        $jadwal->selasa = $request->selasa;
        $jadwal->rabu = $request->rabu;
        $jadwal->kamis = $request->kamis;
        $jadwal->jumat = $request->jumat;
        $jadwal->sabtu = $request->sabtu;
        $jadwal->minggu = $request->minggu;
        $jadwal->id_admin = $request->id_admin;
        $jadwal->id_device = $request->saklar_id;
        $jadwal->nilai = $request->nilai;
        $jadwal->tgl_jadwal = $request->tgl_jadwal;
        $jadwal->jam_jadwal = $request->jam_jadwal;
        $jadwal->save();

        

        Alert::success('Sukses', 'Menambah nomor rumah');
        return redirect()->back();   
    
    }

    public function hapusJadwal($id){

        JadwalDevice::findOrFail($id)->delete();

        Alert::success('Sukses', 'Menghapus Schedule');
        return redirect()->back();   
    
    }

    //=================================================================
        //Iot Api
    //===================================================================
    public function controlIotApi(){
        $saklar = Saklar::where('id_admin','=',Auth::user()->id)->get();

        return response()->json([
            'pesan' => 'berhasil',
            'controliotapi' => $saklar
        ],200);
    }

    public function powerIotApi($id){
        $on = 1;
        $off = 0;
        $value = Saklar::findOrFail($id);
        
        if($value->nilai_saklar == 1){
            $value->nilai_saklar = 0;
        }elseif($value->nilai_saklar == 0){
            $value->nilai_saklar = 1;
        }
        $value->save();

        return response()->json([
            'pesan' => 'berhasil',
            'poweriotapi' => $value
        ],200);
    }

    public function jadwalIotApi(){
        $jadwal = JadwalDevice::where('id_admin','=',Auth::user()->id)->get();

        return response()->json([
            'pesan' => 'berhasil',
            'jadwaliotapi' => $jadwal
        ],200);
    }

    public function tambahJadwalIotApi(Request $request){
        $jadwal = new JadwalDevice;
        $jadwal->senin = $request->senin;
        $jadwal->selasa = $request->selasa;
        $jadwal->rabu = $request->rabu;
        $jadwal->kamis = $request->kamis;
        $jadwal->jumat = $request->jumat;
        $jadwal->sabtu = $request->sabtu;
        $jadwal->minggu = $request->minggu;
        $jadwal->id_admin = $request->id_admin;
        $jadwal->id_device = $request->saklar_id;
        $jadwal->nilai = $request->nilai;
        $jadwal->tgl_jadwal = $request->tgl_jadwal;
        $jadwal->jam_jadwal = $request->jam_jadwal;
        $jadwal->save();
        
        return response()->json([
            'pesan' => 'berhasil',
            'tambahjadwaliotapi' => $jadwal
        ],200);
    }

    public function hapusJadwalIotApi($id){
        $hapus = JadwalDevice::findOrFail($id)->delete();

        return response()->json([
            'pesan' => 'berhasil',
            'hapusjadwaliotapi' => $hapus
        ],200);
    }
}
