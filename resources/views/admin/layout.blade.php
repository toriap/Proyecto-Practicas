<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
  <title>UFT</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/Buttons-1.7.0/css/buttons.bootstrap4.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">
  <link href="{{ asset('adminlte/css/main.css') }}" rel="stylesheet">

  <!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home') }}" class="nav-link">Home</a>
      </li>
      @if(Auth::user()->hasRole('director'))
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('config') }}" class="nav-link">Mis datos</a>
        </li>
      @elseif(Auth::user()->hasRole('admin'))
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('config.admin') }}" class="nav-link">Mis datos</a>
        </li>
      @endif
      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </li>
    </ul>

    <!-- Right navbar links -->
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('adminlte/img/logo-uft.png') }}" alt="UFT" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">UFT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
          <img src="adminlte/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> --}}
        <div class="">
          <a href="#" class="d-block ml-2">{{ Auth::user()->name }} <span class="info" style="display: initial;">{{ Auth::user()->lastname }}</span></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              
               @if(Auth::user()->hasRole('admin'))

               <li class="nav-item has-treeview menu-close">
                <a href="#" class="nav-link ">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Usuarios
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('register.director') }}" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Crear usuarios directivos</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('user.listDirectors') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Mostrar usuarios directivos</p>
                    </a>
                  </li>
                  
                </ul>
                <li class="nav-item has-treeview menu-close">
                  <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-user-tie"></i>
                    <p>
                      Docentes
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ route('register.operativeAdmin', 'true') }}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Crear docentes</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('user.listOperativesAdmin') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Mostrar docentes</p>
                      </a>
                    </li>
                  </ul>
                <li class="nav-item has-treeview menu-close">
                  <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-chart-bar"></i>
                    <p>
                      Reportes
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ route('decan.listAdmin') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Reporte por decanato</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('school.listAdmin') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Reporte por escuela</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('user.listOperativesAdmin', 'true') }}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Reporte por docente</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('subject.listAdmin') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Reporte por materia</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('parameters.reportCompleteAdmin') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Reporte completo</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('parameters.statisticsAdmin') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Estadisticas de elementos</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="{{ route('parametersAdmin') }}" class="nav-link">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>
                      Evaluación docente
                    </p>
                  </a>
                </li>
              </li>
              <li class="nav-item">
                <a href="{{ route('lapse') }}" class="nav-link">
                  <i class="nav-icon fas fa-plus"></i>
                  <p>
                    Agregar Lapso
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('decan') }}" class="nav-link">
                  <i class="nav-icon fas fa-graduation-cap"></i>
                  <p>
                    Agregar Decanato
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('school') }}" class="nav-link">
                  <i class="nav-icon fas fa-school"></i>
                  <p>
                    Agregar Escuela
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('section') }}" class="nav-link">
                  <i class="nav-icon fas fa-door-closed"></i>
                  <p>
                    Agregar Seccion
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('subject') }}" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Agregar Materias
                  </p>
                </a>
              </li>
            
           @elseif(Auth::user()->hasRole('director'))
           <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Docentes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('register.operative', 'true') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear docentes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.listOperatives') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mostrar docentes</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Reportes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('decan.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte por decanato</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('school.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte por escuela</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.listOperatives', 'true') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte por docente</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('subject.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte por materia</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('parameters.reportComplete') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte completo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('parameters.statistics') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Estadisticas de elementos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('parameters') }}" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Evaluación docente
              </p>
            </a>
          </li>
           @endif
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        
        @yield('content')

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
     
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021 UFT</a>.</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->


<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('adminlte/JSZip-2.5.0/jszip.min.js') }}"></script>
<script src="{{ asset('adminlte/pdfmake-0.1.36/pdfmake.min.js') }}"></script>
<script src="{{ asset('adminlte/pdfmake-0.1.36/vfs_fonts.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminlte/Buttons-1.7.0/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/Buttons-1.7.0/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('adminlte/Buttons-1.7.0/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('adminlte/DataTables-1.10.24/js/dataTables.searchPanes.min.js') }}"></script>
<script src="{{ asset('adminlte/DataTables-1.10.24/js/dataTables.select.min.js') }}"></script>


<script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>

<!-- date-range-picker -->
<script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('adminlte/js/adminlte.min.js') }}"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    $('select').select2({    
      language: {

        noResults: function() {

          return "No hay resultado";        
        },
        searching: function() {

          return "Buscando..";
        }
      }
    });

    //Date range picker
    $('#date_range').daterangepicker({
      locale: {
        format: 'DD/MM/YYYY',
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
        "fromLabel": "De",
        "toLabel": "A",
        "daysOfWeek": [
            "Dom",
            "Lun",
            "Mar",
            "Mie",
            "jue",
            "Vie",
            "Sa"
        ],
        monthNames: [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
        ]
      }
      
    })

    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "pageLength": 25,
      "dom": 'Bfrtip',
      "buttons": [
        {
          "extend": 'excelHtml5',
          "text": '<i class="fas fa-file-excel"</i>',
          "title": "Exportar a Excel",
          "className": 'btn btn-success'
        },
      ],
      "language": {
        "decimal": ",",
        "thousands": ".",
        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "infoPostFix": "",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "lengthMenu": "Mostrar _MENU_ registros",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
        "processing": "Procesando...",
        "search": "Buscar:",
        "searchPlaceholder": "Término de búsqueda",
        "zeroRecords": "No se encontraron resultados",
        "emptyTable": "Ningún dato disponible en esta tabla",
        "aria": {
            "sortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        //only works for built-in buttons, not for custom buttons
        "buttons": {
            "create": "Nuevo",
            "edit": "Cambiar",
            "remove": "Borrar",
            "copy": "Copiar",
            "csv": "fichero CSV",
            "excel": "tabla Excel",
            "pdf": "documento PDF",
            "print": "Imprimir",
            "colvis": "Visibilidad columnas",
            "collection": "Colección",
            "upload": "Seleccione fichero...."
        },
        "select": {
            "rows": {
                _: '%d filas seleccionadas',
                0: 'clic fila para seleccionar',
                1: 'una fila seleccionada'
            }
        }
    } 
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "language": {
        "decimal": ",",
        "thousands": ".",
        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "infoPostFix": "",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "lengthMenu": "Mostrar _MENU_ registros",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
        "processing": "Procesando...",
        "search": "Buscar:",
        "searchPlaceholder": "Término de búsqueda",
        "zeroRecords": "No se encontraron resultados",
        "emptyTable": "Ningún dato disponible en esta tabla",
        "aria": {
            "sortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        //only works for built-in buttons, not for custom buttons
        "buttons": {
            "create": "Nuevo",
            "edit": "Cambiar",
            "remove": "Borrar",
            "copy": "Copiar",
            "csv": "fichero CSV",
            "excel": "tabla Excel",
            "pdf": "documento PDF",
            "print": "Imprimir",
            "colvis": "Visibilidad columnas",
            "collection": "Colección",
            "upload": "Seleccione fichero...."
        },
        "select": {
            "rows": {
                _: '%d filas seleccionadas',
                0: 'clic fila para seleccionar',
                1: 'una fila seleccionada'
            }
        }
    }
    });

  
  });
</script>

@yield('script')
</body>
</html>
