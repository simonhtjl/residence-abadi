<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Penduduk;
use App\Models\Pengaduan;
use App\Models\Rumah;
use App\Models\User;
use App\Models\Iuran;
use App\Models\PembayaranIuran;
use Alert;
use App\Notifications\ResetPasswordNotification;
use Auth;
use Validator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $penduduk =  Penduduk::all();
        $rumah =  Rumah::all();
        $pengaduan = Pengaduan::all();
        $notif = Pengaduan::where('status', '=', 'belumselesai')->get();

        return view('admin.penduduk',compact(['penduduk','rumah','pengaduan','notif']));
    }

    public function indexAdmin(){
        $admin =  Admin::all();
        $pengaduan = Pengaduan::all();
        $notif = Pengaduan::where('status', '=', 'belumselesai')->get();

        return view('admin.admin',compact(['admin','pengaduan','notif']));

    }

    public function indexRumah(){
        $rumah = Rumah::all();
        $pengaduan = Pengaduan::all();
        $notif = Pengaduan::where('status', '=', 'belumselesai')->get();

        return view('admin.daftar_rumah',compact(['rumah','pengaduan','notif']));
    }

    public function indexPengaduan(){
        $pengaduan = Pengaduan::all();
        $notif = Pengaduan::where('status', '=', 'belumselesai')->get();

        return view('admin.daftar_pengaduan',compact(['pengaduan','notif']));
    }

    public function indexIuran(){
        $iuran = Iuran::all();
        $pengaduan = Pengaduan::all();
        $notif = Pengaduan::where('status', '=', 'belumselesai')->get();


        return view('admin.daftar_iuran',compact(['iuran','pengaduan','notif']));
    }

    public function tampilPembayaran($id){
        $bukti = PembayaranIuran::where('iuran_id','=',$id)->get();
        $pengaduan = Pengaduan::all();
        $notif = Pengaduan::where('status', '=', 'belumselesai')->get();

        return view('admin.pembayaran_iuran',compact(['bukti','pengaduan','notif']));
    }

    public function tambahRumah(Request $request){
        $rumah = new Rumah;
        $rumah->no_rumah = $request->norumah;
        $rumah->save();

        Alert::success('Sukses', 'Menambah nomor rumah');
        return redirect()->back();
    }

    public function hapusRumah($id)
    {
        Rumah::findOrFail($id)->delete();
        Alert::success('Sukses', 'Menghapus Nomor Rumah');
        return redirect()->back();
    }

    public function editRumah(Request $request,$id)
    {
        $rumah = Rumah::findOrFail($id);
        $rumah->no_rumah = $request->input('norumah');
        $rumah->save();
        Alert::warning('Sukses', 'Merubah Nomor Rumah');
        return redirect()->back();
    }

    public function tambahUser(Request $request){
        $this->validate($request,[
            'noktp' =>'required',
            'nama'=> 'required',
            'norumah' => 'required',
            'email' => 'required',
            'fotodiri'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'required',
        ]);

        $email = $request->email;
        if(User::where('email', '=', $email)->count() > 0){
            Alert::warning('Gagal', 'Email ini sudah terdaftar !');
            return redirect()->back();
        }else{
            $imgName = $request->fotodiri->getClientOriginalName() . '-' . time()
            . '.' . $request->fotodiri->extension();
    
            $request->fotodiri->move(public_path('gambar'), $imgName);
    
            $pemilik_rumah = new Penduduk;
            $pemilik_rumah->no_ktp = $request->noktp;
            $pemilik_rumah->nama_lengkap = $request->nama;
            $pemilik_rumah->no_rumah = $request->norumah;
            $pemilik_rumah->email = $request->email;
            $pemilik_rumah->foto_diri = $imgName;
            $pemilik_rumah->save();

            // $user = new User;
            // $user->nama = $request->nama;
            // $user->email = $request->email;
            // $user->password = $request->password;
            // $user->role = $request->role;
            // $user->save();

            // $user = User::create(request(['nama','email','password','role']));
            $user = User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
             ]);

            $token = $user->createToken('auth_token')->plainTextToken;
            $user->notify(new ResetPasswordNotification($user));

            Alert::success('Sukses', 'Menambahkan akun');
            return redirect()->back();
        }
        
    }

    // public function hapusUser($id){
    //     PemilikRumah::findOrFail($id)->delete();
    //     Admin::findOrFail($id)->delete();
        

    //     Alert::success('Sukses', 'Menghapus Nomor User');
    //     return redirect()->back();
    // }

    public function tambahAdmin(Request $request){
        $this->validate($request,[
            'noktp' =>'required',
            'nama'=> 'required',
            'email' => 'required',
            'fotodiri'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'role'=> 'required',
            'password' => 'required',
        ]);

        $email = $request->email;
        if(User::where('email', '=', $email)->count() > 0){
            Alert::warning('Gagal', 'Email ini sudah terdaftar !');
            return redirect()->back();
        }else{
            $imgName = $request->fotodiri->getClientOriginalName() . '-' . time()
            . '.' . $request->fotodiri->extension();
    
            $request->fotodiri->move(public_path('gambar'), $imgName);
    
            $admin = new Admin;
            $admin->no_ktp = $request->noktp;
            $admin->nama_lengkap = $request->nama;
            $admin->email = $request->email;
            $admin->foto_diri = $imgName;
            $admin->save();

            // $user = new User;
            // $user->nama = $request->nama;
            // $user->email = $request->email;
            // $user->password = $request->password;
            // $user->save();

            $user = User::create(request(['nama','email','password','role']));

            // // $user->notify(new ResetPasswordNotification($user));
            Alert::success('Sukses', 'Menambahkan akun');
            return redirect()->back();
        }
        
    }

    public function ubahStatus($id){

        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->status = "selesai";
        $pengaduan->save();

        Alert::success('Sukses', 'Mengubah status');
        return redirect()->back(); 
    }

    public function tambahIuran(Request $request){

        $this->validate($request,[
            'deskripsi' =>'required',
            'jumlah'=> 'required',
            'bulan' => 'required',
 
        ]);

        $iuran = new Iuran;
        $iuran->deskripsi = $request->deskripsi;
        $iuran->jumlah = $request->jumlah;
        $iuran->bulan = $request->bulan;
        $iuran->save();

        Alert::success('Sukses', 'Menambah Iuran');
        return redirect()->back();         

    }

    public function editIuran(Request $request, $id)
    {

        $this->validate($request, [
            'deskripsi' =>'required',
            'jumlah'=> 'required',
            'bulan' => 'required',
        ]);

        $iuran = Iuran::findOrFail($id);
        $iuran->deskripsi = $request->deskripsi;
        $iuran->jumlah = $request->jumlah;
        $iuran->bulan = $request->bulan;
        $iuran->save();

        Alert::success('Sukses', 'Mengedit Iuran');
        return redirect()->back();        
    }   

    public function hapusIuran($id){
        Iuran::findOrFail($id)->delete();

        Alert::success('Sukses', 'Menghapus Iuran');
        return redirect()->back();   
    }
}
