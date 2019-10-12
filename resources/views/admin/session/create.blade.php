@extends('account.layouts.master')

@section('account_content_sub_header')
    Academic sessions
@endsection

@section('account_content_box_title')
    Start a new academic session
@endsection

@section('account_content_box_body')
    <div class="col-md-6 col-md-offset-3">
        <form action="{{ route('admin.session.create') }}" method="POST">
            @csrf
            <div class="form-group {{ $errors->has('year') ? ' has-error' : '' }}">
                <label for="year" class="control-label">Academic Year</label>
                    <input type="text" name="year" class="form-control" value="{{ date('Y') . '/' . now()->addYear()->format('Y') }}"
                           placeholder="Academic year" id="year" required>
                    @if ($errors->has('year'))
                        <span class="help-block">
                            <strong>{{ $errors->first('year') }}</strong>
                        </span>
                    @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Create and start Session</button>
            </div>
        </form>
    </div>
@endsection
