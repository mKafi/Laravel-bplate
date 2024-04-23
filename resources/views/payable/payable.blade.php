@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="/css/page/page_payable.css">    
@stop

@section('title', 'Amount payable')

@section('content_header')
    <h1>Amount payable</h1>
@stop

@section('content')
    @include('flash-message')
    @include('layouts.datatable.datatable')
@stop

@section('js')
  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <!-- custom JS -->
  <script src="/js/page/payable.js"></script>

  <!-- Page specific script -->
  <script>
    $(function () {
      $("#grid-table").DataTable({
        "responsive": true,       
        "lengthChange": false, 
        "autoWidth": false,
        "paging": true,
        "searching": true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#grid-table .col-md-6:eq(0)');
    });
  </script>
@stop