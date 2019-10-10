{{-- Extend the main layout file --}}
@extends('layouts.default')

@include('layouts.partials._styles')

@section('body_class', 'skin-blue layout-top-nav')

@section('body')
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">
            @include('layouts.partials._navigation')
        </header>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" id="main">
            <div class="container">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                @yield('content_header')
            </section>

            <!-- Main content -->
            <section class="content ml-0">

                @yield('content')

            </section>
            <!-- /.content -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /.content-wrapper -->
        @include('layouts.partials._footer')
    </div>
    <!-- ./wrapper -->
@stop
