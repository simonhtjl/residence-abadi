<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Residence Abadi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    @include('sweetalert::alert')
    @include('layouts.header')
    @include('layouts.sidebar')

    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        @yield("content")
      </section>
      <!-- /.content -->
    </div>

    @include('layouts.footer')



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
<script>
	$('.delete-rumah').click(function(){
		  var akun = $(this).attr('akun-id');
      var name = $(this).attr('akun-name');
		  swal({
		  title: "Yakin  ?",
		  text: "Mau menghapus " +name + "?",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  
		  if (willDelete) {
		    window.location = "admin/hapusrumah/"+akun;
		  } 
		}); 
	});
</script>
<script>
	$('.delete-user').click(function(){
		  var akun = $(this).attr('akun-id');
      var name = $(this).attr('akun-name');
		  swal({
		  title: "Yakin  ?",
		  text: "Mau menghapus " +name + "?",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  
		  if (willDelete) {
		    window.location = "admin/hapususer/"+akun;
		  } 
		}); 
	});
</script>
<script>
	$('.delete-iuran').click(function(){
		  var akun = $(this).attr('akun-id');
      var name = $(this).attr('akun-name');
		  swal({
		  title: "Yakin  ?",
		  text: "Mau menghapus " + "?",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  
		  if (willDelete) {
		    window.location = "daftariuran/hapusiuran/"+akun;
		  } 
		}); 
	});
</script>
</html>
