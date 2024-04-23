@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="/css/page/page_invoice.css">    
@stop

@section('title', 'Invoice details')

@section('content_header')
    <h1>Invoice# <?php if(!empty($itemData->invoiceInfo->invoiceId)) { echo $itemData->invoiceInfo->invoiceId; } ?></h1>
@stop

@section('content')
    @include('flash-message')
    @include('invoice.details-template')
@stop

@section('js')
  <!-- DataTables  & Plugins -->  
  
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>  
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>  
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>  
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <!-- custom JS -->
  <script src="/js/page/invoice.js"></script>
@stop