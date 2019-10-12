@admin
    @extends('account.layouts.master')

    @section('account_content_sub_header')
        Classes
    @endsection

    @section('account_content_box_title')
        <span class="fa fa-plus"></span> Add a new class
    @endsection

    @section('account_content_box_body')
        <div class="col-md-6 col-md-offset-3">
            <form action="{{ route('admin.class.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <p>Active academic session- <span class="text-bold">{{ $activeSession->year }}</span></p>
                </div>
                <div class="form-group">
                    <select name="semester" class="form-control">
                        @foreach($activeSession->semesters as $semester)
                            <option value="{{ $semester->id }}">{{ ucfirst($semester->type) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                        <input type="text" name="code" class="form-control" value="{{ old('code') }}"
                               placeholder="Course Code" required>
                        @if ($errors->has('code'))
                            <span class="help-block">
                                <strong>{{ $errors->first('code') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                                   placeholder="Course Title" required>
                        @if ($errors->has('code'))
                            <span class="help-block">
                                 <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                           <button type="submit" class="btn btn-primary btn-block"> <i class="fa fa-check-circle"></i> Create class</button>
                    </div>
            </form>
        </div>

    @endsection
@endadmin
