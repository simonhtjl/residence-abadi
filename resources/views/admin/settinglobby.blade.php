@extends('layouts.main')
@section('content')
<!-- Modal -->
<div class="modal fad" id="modal-default">
    <div class="modal-dialog modal-">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title">Tambah</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">            
          <form action="/settinglobby/tambahSaklar" method="post" enctype="multipart/form-data">
          @csrf

            <div class="form-group col-4">
              <label for="exampleFormControlSelect1">ID</label>
                <select class="form-control " id="exampleFormControlSelect1" name="id_admin">
                <option value="" disabled="disabled">Pilih ID User</option>
                  @foreach($user as $key=>$u)
                  <option value="{{$u->id}}"  >{{$u->id}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group col-8">
                <label for="nama">Nama Saklar</label>
                <input type="text" class="form-control" name="nm_saklar"  id="nm_saklar" placeholder="Nama Saklar" required>
              </div>
              
          <div class="row">
            <div class="form-group col-4">
              <label for="exampleFormControlSelect1">Nilai</label>
                <select class="form-control " id="exampleFormControlSelect1" name="nilai_saklar">
                  <option value="0" selected >Off</option>
                  <option value="1">On</option>
                </select>
              </div>

              <div class="form-group col-4">
              <label for="exampleFormControlSelect1">Kategori</label>
                <select class="form-control " id="exampleFormControlSelect1" name="kategori">
                  <option value="lobby" selected >Lobby</option>
                </select>
              </div>
          </div>
          
          <div class="row">
            <div class="form-group col-4">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" name="tgl_saklar"  id="tgl_saklar" value={{now()}} required>
              </div>

              <div class="form-group col-4">
                <label for="tanggal">Jam</label>
                <input type="time" class="form-control" name="jam_saklar"  value="{{Carbon\Carbon::now()->format('H:i')}}" id="jam_saklar" required>
              </div>
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

@foreach($settinglobby as $key=>$sl)
    <div class="modal fade" id="modal-edit{{$sl->saklar_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><legend>Edit Channel</legend></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body">
              <form action="/settinglobby/updateSaklar/{{$sl->saklar_id}}" method="post" enctype="multipart/form-data">
              @csrf

                <div class="form-group">
                  <label for="nama">Nama Saklar</label>
                  <input type="text" class="form-control" name="nm_saklar"  id="nm_saklar" value="{{$sl->nm_saklar}}"required>
                </div>

                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-warning">Edit</button>  
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>
    @endforeach

<section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
           <div class="col-6">
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Saklar</h3>
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
                    <th>No</th>
                    <th>ID User</th>
                    <th>Channel</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($settinglobby as $key=>$sl )
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$sl->id_admin}}</td>
                        <td>{{$sl->nm_saklar}}</td>
                        <td>
                            <button type="button" class="btn  btn-sm btn-warning"data-toggle="modal" data-target="#modal-edit{{$sl->saklar_id}}">Edit</button> &nbsp
                            <a href="#" class="btn btn-danger btn-sm delete-saklar" akun-id="{{$sl->saklar_id}}" akun-name="{{$sl->nm_saklar}}">Hapus</a> &nbsp            
                        </td>
                    </tr>   
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