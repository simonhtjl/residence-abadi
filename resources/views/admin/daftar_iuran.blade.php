@extends('layouts.main')
@section('content')
<!-- Modal -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title">Tambah Iuran</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">            
          <form action="/daftariuran/tambahiuran" method="post" enctype="multipart/form-data">
          @csrf

            <div class="form-group">
              <label for="nama">Deskripsi</label>
              <input type="text" class="form-control" name="deskripsi"  id="deskripsi" placeholder="Deskripsi Iuran" required>
            </div>
            <div class="form-group">
              <label for="jumlah">Jumlah</label>
              <input type="text" class="form-control" name="jumlah"  id="jumlah" placeholder="Jumlah" required>
            </div>
            <div class="form-group">
              <label for="bulan">Bulan</label>
              <input type="date" class="form-control" name="bulan"  id="bulan" placeholder="Bulan" required>
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

<div>
  @foreach ($iuran as $key=>$i )
    <div class="modal fade" id="modal-edit{{$i->id}}">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title">Edit Iuran</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
          <form action="daftariuran/editiuran/{{$i->id}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label for="nama">Deskripsi</label>
              <input type="text" class="form-control" name="deskripsi"  id="deskripsi" value="{{$i->deskripsi}}">
            </div>
            <div class="form-group">
              <label for="jumlah">Jumlah</label>
              <input type="text" class="form-control" name="jumlah"  id="jumlah" value="{{$i->jumlah}}">
            </div>
            <div class="form-group">
              <label for="bulan">Bulan</label>
              <input type="date" class="form-control" name="bulan"  id="bulan" value="{{$i->bulan}}">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Tambah</button>  
            </div>
          </form>      
          </div>
          </div>
          <!-- /.modal-content -->
      </div>
        <!-- /.modal-dialog -->
    </div>
    @endforeach  
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
                    <h3 class="card-title">Daftar Iuran</h3>
                    <div class="float-right">

                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">
                    Tambah Iuran
                    </button>
                </div>
            </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>                  
                  <tr>
                    <th>No</th>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                    <th>Bulan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($iuran as $key=>$i )
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$i->deskripsi}}</td>
                        <td>Rp. {{$i->jumlah}}</td>
                        <td>{{date('F Y', strtotime($i->bulan))}}</td>
                        <td>
                            <button type="button" class="btn  btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit{{$i->id}}">Edit</button> &nbsp
                            <a href="#" class="btn btn-danger btn-sm delete-iuran" akun-id="{{$i->id}}" akun-name="{{$i->bulan}}">Hapus</a> &nbsp
                            <a href="/daftariuran/buktipembayaran/{{$i->id}}" class="btn  btn-sm btn-warning">View</a>                
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