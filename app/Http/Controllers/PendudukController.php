<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Iuran;
use App\Models\PembayaranIuran;
use Alert;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PendudukController extends Controller
{
    public function index()
    {
        return view('penduduk.index');
    }

    public function indexPengaduan(){
        $pengaduan = Pengaduan::all();

        return view('penduduk.pengaduan',compact(['pengaduan']));
    }

    public function indexIuran(){;
        $iuran = Iuran::all();

        return view('penduduk.iuran',compact(['iuran']));
    }

    public function tambahPengaduan(Request $request){
        $this->validate($request,[
            'pengaduan' =>'required',
            'tanggal'=> 'required',
            'file_pendukung'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imgName = $request->file_pendukung->getClientOriginalName() . '-' . time()
        . '.' . $request->file_pendukung->extension();

        $request->file_pendukung->move(public_path('gambarPengaduan'), $imgName);

        $pengaduan = new Pengaduan;
        $pengaduan->pengaduan = $request->pengaduan;
        $pengaduan->tanggal = $request->tanggal;
        $pengaduan->pemilikrumah = $request->pemilikrumah;
        $pengaduan->file_pendukung = $imgName;
        $pengaduan->save();

        Alert::success('Sukses', 'Menambah Pengaduan');
        return redirect()->back();
    }

    public function upload(Request $request,$id){
        $imgName = $request->buktipembayaran->getClientOriginalName() . '-' . time()
        . '.' . $request->buktipembayaran->extension();

        $request->buktipembayaran->move(public_path('gambarPembayaran'), $imgName);

        $bukti = new PembayaranIuran;
        $bukti->iuran_id = $id;
        $bukti->pemilikrumah = $request->pemilikrumah;
        $bukti->jumlah = $request->jumlah;
        $bukti->bulan = $request->bulan;
        $bukti->status = "Lunas";
        $bukti->buktipembayaran = $imgName;
        $bukti->save();
        
        Alert::success('Sukses', 'Mengupload Bukti Pembayaran');
        return redirect()->back();
    }

    public function indexapi(){
 
    }

    public function pengaduanapi(){
        $pengaduan = Pengaduan::all();

        return response()->json([
            'pesan' => 'berhasil',
            'pengaduan' => $pengaduan
        ],200);

    }

    public function iuranapi(){
               $iuran = Iuran::all();

        return response()->json([
            'pesan' => 'berhasil',
            'iuran' => $iuran
        ],200);
    }

    public function uploadapi(Request $request){
        $validator = Validator::make($request->all(),[
            'buktipembayaran' =>'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }


        try{

            $iuran = PembayaranIuran::create($request->all());
             
             $response = [
                 'pesan' => 'Program created successfully.',
                 'data' => $iuran
             ];

             return response()->json($response,201);
             
        }catch(QueryException $e){
            return response()->json([
                'pesan' => "Gagal" . $e->errorInfo
                ]
            );
        }
    }

    public function tambahpengaduanapi(Request $request){
        $validator = Validator::make($request->all(),[
            'pengaduan' =>'required',
            'tanggal'=> 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }


        try{

            $pengaduan = Pengaduan::create($request->all());
             
             $response = [
                 'pesan' => 'Program created successfully.',
                 'data' => $pengaduan
             ];

             return response()->json($response,201);

        }catch(QueryException $e){
            return response()->json([
                'pesan' => "Gagal" . $e->errorInfo
                ]
            );
        }

    }

    public function history(){
        $nama = Auth::user()->nama;
        $history = PembayaranIuran::where('pemilikrumah','=',$nama)->get();

        $response =  [
            'pesan' => 'berhasil mendapatkan history',
            'data' => $history,
        ];

        return response()->json($response,200);
    }
}
