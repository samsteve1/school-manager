@extends('account.layouts.master')

@section('account_content_sub_header')
    Change password
@endsection

@section('account_content_box_title')
    <span class="fa fa-lock"></span> Change your account password
@endsection

@section('account_content_box_body')
    <div class="col-md-6 col-md-offset-3">
        <form action="{{ route('account.password.store') }}" method="POST">
            @csrf
            <div class="form-group {{ $errors->has('current_password') ? ' has-error' : '' }}">
                    <input type="password" name="current_password" class="form-control"
                           placeholder="Enter your current password" required>
                    @if ($errors->has('current_password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('current_password') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" name="password" class="form-control" value="{{ old('password') }}"
                           placeholder="New password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
            </div>
            <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}"
                           placeholder="Confirm new password" required>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> <span class="fa fa-key"></span> Change password</button>
            </div>
        </form>
    </div>
@endsection
