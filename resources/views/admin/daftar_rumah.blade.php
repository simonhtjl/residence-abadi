@extends('layouts.main')
@section('content')
<!-- Modal -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title">Tambah Daftar Rumah</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">            
          <form action="/admin/tambahrumah" method="post" enctype="multipart/form-data">
          @csrf

            <div class="form-group">
              <label for="nama">No. Rumah</label>
              <input type="text" class="form-control" name="norumah"  id="norumah" placeholder="No. Rumah" required>
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
  @foreach ($rumah as $key=>$r )
    <div class="modal fade" id="modal-edit{{$r->id}}">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title">Edit No. Rumah</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
          <form action="admin/editrumah/{{$r->id}}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
              <label for="norumah">No. Rumah</label>
              <input type="text" class="form-control" name="norumah" value="{{$r->no_rumah}}" id="namaEvent">
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
                    <h3 class="card-title">DAFTAR RUMAH</h3>
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
                    <th>Nomor Rumah</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($rumah as $key=>$r)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$r->no_rumah}}</td>
                        <td>
                        <button type="button" class="btn  btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit{{$r->id}}">Edit</button> &nbsp
                           <a href="#" class="btn btn-danger btn-sm delete-rumah" akun-id="{{$r->id}}" akun-name="{{$r->no_rumah}}">Hapus</a>                 
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