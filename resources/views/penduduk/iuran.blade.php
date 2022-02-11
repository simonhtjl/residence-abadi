@extends('layouts.main')
@section('content')

<div>
  @foreach ($iuran as $key=>$i )
    <div class="modal fade" id="modal-edit{{$i->id}}">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title">Upload Bukti</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
          <form action="iuran/upload/{{$i->id}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label for="pemilikrumah">Pemilik Rumah</label>
              <input type="text" class="form-control" name="pemilikrumah"  id="pemilikrumah" value="{{Auth::user()->nama}}" readonly>
            </div>
            <div class="form-group">
              <label for="jumlah">Jumlah Tagihan</label>
              <input type="text" class="form-control" name="jumlah"  id="jumlah" value="{{$i->jumlah}}" readonly>
            </div>
            <div class="form-group">
              <label for="bulan">Bulan</label>
              <input type="date" class="form-control" name="bulan"  id="bulan" value="{{$i->bulan}}" readonly>
            </div>
            <div class="form-group">
              <label for="buktipembayaran">File/Gambar</label>
              <input type="file" class="form-control" name="buktipembayaran"  id="buktipembayaran"required>
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Upload</button> 
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
                    <h3 class="card-title">Tagihan Iuran</h3>
                    <div class="float-right">
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
                    <th>Bukti Pembayaran</th>
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
                          <button type="button" class="btn  btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit{{$i->id}}"><i class="fas fa-upload"></i></button>
                              @foreach ($i->pembayaranIuran as $key=>$p)
                                @if(Auth::user()->nama == $p->pemilikrumah)
                                  <i>  &nbsp&nbsp&nbsp{{$p->status}}</i>
                                @endif
                              @endforeach
                                   
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