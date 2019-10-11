@if (session('status'))
    <div class="alert alert-info" role="alert">
        <span class="fa fa-info-circle" aria-hidden="true"></span>

        {{ session('status') }}
   </div>
@endif

@if (session('success'))
    <div class="alert alert-success" role="alert">
        <span class="fa fa-check-circle" aria-hidden="true"></span>

        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" role="alert">
        <span class="fa fa-exclamation" aria-hidden="true"></span>

        {{ session('error') }}
    </div>
@endif
