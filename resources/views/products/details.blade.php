@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="/css/page/page_products.css">    
@stop

@section('title', 'Product details')

@section('content_header')
    <h1>Product details</h1>
@stop

@section('content')
    @include('flash-message')
    @include('products.details-template')
@stop

@section('js')
  <!-- DataTables  & Plugins -->  
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>  
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>  
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>  
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>  
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <!-- custom JS -->
  <script src="/js/page/products.js"></script>
@stop