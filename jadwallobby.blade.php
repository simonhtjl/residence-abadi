@extends('layouts.main')
@section('content')
<!-- Modal -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title">Tambah</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">            
          <form action="/jadwallobby/tambahJadwal" method="post" enctype="multipart/form-data">
          @csrf


          <div class="form-group">
              <label for="nama">ID User</label>
              <input type="text" class="form-control" name="id_admin"  id="id_admin" value="{{Auth::user()->id}}" readonly>
            </div>

          <div class="form-group">
             <label for="exampleFormControlSelect1">Device</label>
              <select class="form-control " id="exampleFormControlSelect1" name="saklar_id">
              <option value="" disabled="disabled">Pilih Device</option>
                @foreach($settinglobby as $key=>$sl)
                  @if(Auth::user()->id == $sl->id_admin)
                    <option value="{{$sl->saklar_id}}"  >{{$sl->nm_saklar}}</option>
                  @endif
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="tanggal">Tanggal</label>
              <input type="date" class="form-control" name="tgl_jadwal"  id="tgl_jadwal" value={{now()}} required>
            </div>

            <div class="form-group">
              <label for="tanggal">Clock</label>
              <input type="time" class="form-control" name="jam_jadwal"  id="jam_jadwal" required>
            </div>

            <div class="form-group">
             <label for="exampleFormControlSelect1">Senin</label>
              <select class="form-control " id="exampleFormControlSelect1" name="senin">
                <option value="off" selected >Off</option>
                <option value="on">On</option>
              </select>
            </div>
            <div class="form-group">
             <label for="exampleFormControlSelect1">Selasa</label>
              <select class="form-control " id="exampleFormControlSelect1" name="selasa">
                <option value="off" selected >Off</option>
                <option value="on">On</option>
              </select>
            </div>
            <div class="form-group">
             <label for="exampleFormControlSelect1">Rabu</label>
              <select class="form-control " id="exampleFormControlSelect1" name="rabu">
                <option value="off" selected >Off</option>
                <option value="on">On</option>
              </select>
            </div>
            <div class="form-group">
             <label for="exampleFormControlSelect1">Kamis</label>
              <select class="form-control " id="exampleFormControlSelect1" name="kamis">
                <option value="off" selected >Off</option>
                <option value="on">On</option>
              </select>
            </div>
            <div class="form-group">
             <label for="exampleFormControlSelect1">Jumat</label>
              <select class="form-control " id="exampleFormControlSelect1" name="jumat">
                <option value="off" selected >Off</option>
                <option value="on">On</option>
              </select>
            </div>
            <div class="form-group">
             <label for="exampleFormControlSelect1">Sabtu</label>
              <select class="form-control " id="exampleFormControlSelect1" name="sabtu">
                <option value="off" selected >Off</option>
                <option value="on">On</option>
              </select>
            </div>
            <div class="form-group">
             <label for="exampleFormControlSelect1">Minggu</label>
              <select class="form-control " id="exampleFormControlSelect1" name="minggu">
                <option value="off" selected >Off</option>
                <option value="on">On</option>
              </select>
            </div>

            <div class="form-group">
             <label for="exampleFormControlSelect1">Status</label>
              <select class="form-control " id="exampleFormControlSelect1" name="nilai">
                <option value="0" selected >Mati</option>
                <option value="1">Hidup</option>
              </select>
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Tambah</button>  
            </div>
          </form>
        </div>
      </div>
    </div>
</div>


<section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
           <div class="col-12">
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Schedule Device</h3>
                    <div class="float-right">

                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">
                    Tambah
                    </button>
                </div>
            </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>                  
                  <tr>
                    <th>Saklar</th>
                    <th>Time</th>
                    <th>Action</th>
                    <th>Day</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($jadwaldevice as $key=>$jd )
                    @if(Auth::user()->id == $jd->id_admin)
                    <tr>
                        <td>
                          {{$jd->id_device}} 
                        </td>
                        <td>{{$jd->jam_jadwal}}</td>
                        <td>
                          @if($jd->nilai == 0)  
                            Off
                          @elseif($jd->nilai == 1)
                            On
                          @endif
                        </td>
                        <td>
                          @if($jd->senin == "on") Senin, @endif
                          @if($jd->selasa == "on") Selasa, @endif
                          @if($jd->rabu == "on") Rabu, @endif
                          @if($jd->kamis == "on") Kamis, @endif
                          @if($jd->jumat == "on") Jumat, @endif
                          @if($jd->sabtu == "on") Sabtu, @endif
                          @if($jd->minggu == "on") Minggu @endif
                        
                        </td>
                        <td>
                        <a href="#" class="btn btn-danger btn-sm delete-jadwal" akun-id="{{$jd->id_jadwal}}" akun-name="{{$jd->id_jadwal}}">Hapus</a>           
                        </td>
                    </tr>
                    @endif   
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection