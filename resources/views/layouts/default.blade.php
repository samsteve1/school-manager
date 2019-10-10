<!DOCTYPE html>
<html>
    @include('layouts.partials._head')

<body class="hold-transition @yield('body_class')">

@yield('body')


@include('layouts.partials._scripts')

@include('adminlte::plugins', ['type' => 'js'])

@yield('adminlte_js')

</body>
</html>
