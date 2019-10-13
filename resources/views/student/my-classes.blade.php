@extends('account.layouts.master')

@section('account_content_sub_header')
     Classes
@endsection


@section('account_content_box_title')
    My classes
@endsection

@section('account_content_box_body')
<div class="col-md-6">
    <div class="box info">
        <div class="box-header">
             <h4> Spring semester classes</h4>
        </div>
        @include('student.classes', ['courses' => $springCourses])

    </div>
  </div>
  <div class="col-md-6">
    <div class="box box-warning">
        <div class="box-header">
            <h4>Fall semester classes</h4>
        </div>
        @include('student.classes', ['courses' => $fallCourses])
    </div>
</div>
@endsection
