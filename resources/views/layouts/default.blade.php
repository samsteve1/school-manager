<!DOCTYPE html>
<html>
    @include('layouts.partials._head')

<body class="hold-transition @yield('body_class')">
    <div id="app">

        @yield('body')


        @include('layouts.partials._scripts')

        @include('adminlte::plugins', ['type' => 'js'])

        @yield('adminlte_js')

    </div>
</body>
</html>
