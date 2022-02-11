@extends('layouts.main')
@section('content')
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
                    <th>Pemilik Rumah</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($pengaduan as $key=>$p)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$p->pengaduan}}</td>
                        <td>{{date('d,M Y', strtotime($p->tanggal))}}</td>
                        <td>{{$p->pemilikrumah}}</td>
                        <td>
                          @if($p->status == "belumselesai")
                            <a href="/daftarpengaduan/ubahstatus/{{$p->id}}"class="btn btn-warning btn-sm"><i class="fas fa-check"></i></a>
                            @endif     &nbsp<span><i>{{$p->status}}</i></span>
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