@extends('layouts.main')
@section('content')

<div>
  @foreach ($bukti as $key=>$b )
    <div class="modal fade" id="modal-edit{{$b->id}}">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title">Bukti Pembayran</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <img src="{{asset('gambarPembayaran/'.$b->buktipembayaran)}}" style="width:100%;height:100%">
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
                    <h3 class="card-title"></h3>
                    <div class="float-right">
                </div>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>                  
                  <tr>
                    <th>No</th>
                    <th>Jumlah</th>
                    <th>Pemilik Rumah</th>
                    <th>Status</th>
                    <th>Bukti</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($bukti as $key=>$b )
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$b->jumlah}}</td>
                        <td>{{$b->pemilikrumah}}</td>
                        <td>{{$b->status}}</td>
                        <td>
                            <button type="button" class="btn  btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit{{$b->id}}">Bukti</button>    
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