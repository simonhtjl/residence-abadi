@extends('layouts.main')
@section('content')
<!-- Modal -->
<br>
<div class="container-fluid">
    <div class="row">
        @foreach ($settinglobby as $key=>$sl )
            @if(Auth::user()->id == $sl->id_admin)
            <div class=' col-sm-2  col-12'>
                <div class='info-box'>
                    @if($sl->nilai_saklar == 0)
                        <a href="/controllobby/{{$sl->saklar_id}}" class='info-box-icon bg-primary elevation-1'>
                        <i class='fas fa-power-off'></i></a>
                    @elseif($sl->nilai_saklar == 1)
                        <a href="/controllobby/{{$sl->saklar_id}}" class='info-box-icon bg-dark elevation-1'>
                        <i class='fas fa-power-off'></i></a>
                    @endif
                    <div class='info-box-content'>
                        <span class='info-box-text'>{{$sl->nm_saklar}}</span>
                        <span class='info-box-number'>  
                            @if($sl->nilai_saklar == 0)
                                ON
                            @elseif($sl->nilai_saklar == 1)
                                OFF
                            @endif
                        </span>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </div>
</div>
<!-- <div class=' col-sm-4  col-12'>
    <div class='info-box'>
        <a onclick=window.location.href='#' class='info-box-icon bg-primary elevation-1'>
        <i class='fa fa-key'></i></a>
        <div class='info-box-content'>
            <span class='info-box-text'>Open Door</span>
            <span class='info-box-number '>When The Buzzer Sounds</span>
        </div>
    </div>
</div>
<div class=' col-sm-4  col-12'>
    <div class='info-box'>
        <a onclick=window.location.href='#' class='info-box-icon bg-primary elevation-1'>
        <i class='fa fa-spinner'></i></a>
        <div class='info-box-content'>
            <span class='info-box-text'>Loading..</span>
            <span class='info-box-number '>Wait Sounds</span>
        </div>
    </div>
</div> -->
@endsection