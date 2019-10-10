@section('adminlte_css')
    <link rel="stylesheet"
          href="{{ asset('vendor/adminlte/dist/css/skins/skin-' . config('adminlte.skin', 'blue') . '.min.css')}} ">
    @stack('css')
    @yield('css')
@stop
@section('body_class', 'skin-' . config('adminlte.skin', 'blue') . ' layout-top-nav')

<style>
    #main{
    background-image: url({{ asset('images/cover.jpg') }});
    background-size: cover;
}
</style>
