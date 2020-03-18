<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Wines | Spirits</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('asset/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('asset/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('asset/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('asset/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('asset/dist/css/skins/_all-skins.min.css')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
@include('includes.messages')
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  @include('includes.header')


  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  @include('includes.aside')
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  <footer class="main-footer">

    <strong>Copyright &copy; {{ date("Y", time() ) }} </strong> All rights
    reserved.
  </footer>




  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset( 'asset/bower_components/jquery/dist/jquery.min.js' ) }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset( 'asset/bower_components/bootstrap/dist/js/bootstrap.min.js' ) }}"></script>
<!-- SlimScroll -->
<script src="{{ asset( 'asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js' ) }}"></script>
<!-- FastClick -->
<script src="{{ asset( 'asset/bower_components/fastclick/lib/fastclick.js' ) }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset( 'asset/dist/js/adminlte.min.js' ) }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset( 'asset/dist/js/demo.js' ) }}"></script>
<script src="{{ asset( 'asset/bower_components/datatables.net/js/jquery.dataTables.min.js' ) }}"></script>
<script src="{{ asset( 'asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js' ) }}"></script>

<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>

<script>
        $(function () {
          $('#example1').DataTable()
          $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
          })
        })
      </script>
      <script>



            $(document).ready(()=>{

                $("#newAnalysis").submit((e)=>{
                   // e.preventDefault();
                    var re = confirm("Are you sure you want to start new stock analysis") ;
                    if(re){
                        return  ;
                    }else{
                        return false ;
                    }

                })

            });

    </script>
    <script>
        $(

            $("#senddeletec").submit((e)=>{
               // e.preventDefault();
                var conf = confirm("Are you sure you want to delete  this  category") ;
                if(conf){
                    return true ;
                }else{
                    return false ;
                }
            })
        )
    </script>

</body>
</html>
