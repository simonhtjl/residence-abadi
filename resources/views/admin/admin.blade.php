@extends('layouts.main')
@section('content')
<!-- Modal -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title">Tambah Akun</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">            
          <form action="admin/tambahadmin" method="post" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
             <label for="exampleFormControlSelect1">Role</label>
              <select class="form-control " id="exampleFormControlSelect1" name="role">
                <option value="Admin" selected ><A>Admin</A></option>
              </select>
            </div>

            <div class="form-group">
              <label for="noktp">No. KTP</label>
              <input type="text" class="form-control" name="noktp"  id="noktp" placeholder="No. KTP" required>
            </div>

            <div class="form-group">
              <label for="nama">Nama Lengkap</label>
              <input type="text" class="form-control" name="nama"  id="nama" placeholder="masukan nama lengkap" required>
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email"  id="email" placeholder="masukan email" required>
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password"  id="password" placeholder="masukan password" required>
            </div>

            <div class="form-group">
              <label for="fotodiri">Foto Diri</label>
              <input type="file" class="form-control" name="fotodiri"  id="fotodiri"required>
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

@foreach($admin as $key=>$a)
    <div class="modal fade" id="modal-edit{{$a->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><legend>Detail Admin</legend></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="col-sm">
                <p><strong>Nama         :</strong> {{$a->nama_lengkap}}</p>
                <p><strong>No. KTP         :</strong> {{$a->no_ktp}} Tahun</p>
                <p><strong>Email      :</strong> {{$a->email}}</p>
              </div>
              <div class="col-sm">
                <img src="{{asset('gambar/'.$a->foto_diri)}}" style="width:250px;height:250px;">
              </div>
            </div>
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
           <div class="col-12">
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ADMIN</h3>
                    <div class="float-right">

                    @if(Auth::user()->nama == "superadmin")
                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">
                      Tambah Akun
                      </button>
                    @endif
                </div>
            </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($admin as $key=>$a)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$a->nama_lengkap}}</td>
                        <td>
                        <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit{{$a->id}}">View</a>
                        <!-- <a href="#" class="btn btn-danger btn-sm delete-user" akun-id="{{$a->id}}" akun-name="{{$a->nama_lengkap}}">Hapus</a> -->
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