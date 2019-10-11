@if (session('status'))
    <div class="alert alert-info" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>

        {{ session('status') }}
   </div>
@endif

@if (session('success'))
    <div class="alert alert-sucess" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>

        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>

        {{ session('error') }}
    </div>
@endif
