@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="/css/page/page_new_product.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@stop

@section('title', 'Creating product')

@section('content_header')
    <h1>New product</h1>
@stop

@section('content')
    @include('products.product-new-form')
@stop

@section('js')
    <!-- Bootstrap 4 -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="/plugins/moment/moment.min.js"></script>    
    <!-- date-range-picker -->
    <script src="/plugins/daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom JS -->
    <script src="/js/page/product_new.js"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        }) 
    </script>

@stop 