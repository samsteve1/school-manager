@extends('account.layouts.master')

@section('account_content_sub_header')
    Classes
@endsection

@section('account_content_box_title')
    {{ $activeSession->year }} Classes
@endsection

@section('account_content_box_body')
    <div class="col-md-9 col-md-offset-1">
        <div class="box box-success">
            <div class="box-header">
                <h4>Spring semester classes</h4>
            </div>
            @include('admin.class.class-list', ['courses' => $springCourses])
        </div>
    </div>
    <div class="col-md-9 col-md-offset-1">
        <div class="box box-warning">
            <div class="box-header">
                <h4>Fall semester classes</h4>
            </div>
            @include('admin.class.class-list', ['courses' => $fallCourses])
        </div>
    </div>
@endsection
