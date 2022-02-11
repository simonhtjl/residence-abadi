@extends('layouts.main')
@section('content')
<!-- Modal -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title">Tambah Pengaduan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">            
          <form action="/pengaduan/tambahpengaduan" method="post" enctype="multipart/form-data">
          @csrf

            <div class="form-group">
              <label for="pemilikrumah">Pemilik Rumah</label>
              <input type="text" class="form-control" name="pemilikrumah"  id="pemilikrumah" value="{{Auth::user()->nama}}" readonly>
            </div>

            <div class="form-group">
              <label for="pengaduan">Pengaduan</label>
              <textarea type="text" class="form-control" name="pengaduan"  id="pengaduan" placeholder="" required></textarea>
            </div>

            <div class="form-group">
              <label for="tanggal">Tanggal</label>
              <input type="date" class="form-control" name="tanggal"  id="tanggal" placeholder="" required>
            </div>

            <div class="form-group">
              <label for="file_pendukung">File/Gambar</label>
              <input type="file" class="form-control" name="file_pendukung"  id="file_pendukung"required>
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                    <h3 class="card-title">Daftar Pengaduan</h3>
                    <div class="float-right">

                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">
                    Tambah Pengaduan
                    </button>
                </div>
            </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Pengaduan</th>
                    <th>Tanggal</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($pengaduan as $key=>$p)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$p->pengaduan}}</td>
                        <td>{{date('d,M Y', strtotime($p->tanggal))}}</td>
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