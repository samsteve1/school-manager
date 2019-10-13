@extends('account.layouts.master')

@section('account_content_sub_header')
    Staff
@endsection

@section('account_content_box_title')
    Add Staff
@endsection

@section('account_content_box_body')
    <div class="col-md-6 col-md-offset-3">
        <form action="{{ route('admin.staff.store') }}" method="POST">
            @csrf

            <div class="form-group has-feedback {{ $errors->has('first_name') ? 'has-error' : '' }}">
                    <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}"
                           placeholder="Firstname" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('first_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('last_name') ? 'has-error' : '' }}">
                    <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}"
                           placeholder="Lastname" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('last_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                           placeholder="Email address" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
            </div>
            <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                    <select name="gender" class="form-control">
                         <option value="female">Female</option>
                         <option value="male">Male</option>
                    </select>
                     @if ($errors->has('gender'))
                         <span class="help-block">
                             <strong>{{ $errors->first('gender') }}</strong>
                         </span>
                     @endif
             </div>
             <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" class="form-control"
                           placeholder="Password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
            </div>
             <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="Retype password" required>
                           <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
            </div>
            <div class="form-group  {{ $errors->has('role') ? 'has-error' : '' }}">

                <select name="role" class="form-control">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                    @endforeach
                </select>
                    @if ($errors->has('role'))
                        <span class="help-block">
                            <strong>{{ $errors->first('role') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <button type="sumbit" class="btn btn-primary">Add staff</button>
                </div>
        </form>
    </div>
@endsection
