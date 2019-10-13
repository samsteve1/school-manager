<?php $count = 1;?>
@extends('account.layouts.master')

@section('account_content_sub_header')
    Classes
@endsection

@section('account_content_box_title')
    Enroll in class
@endsection

@section('account_content_box_body')
<div class="col-md-12">
    <div class="box info">
        <div class="box-header">
             <h4> Spring semester classes</h4>
        </div>
        @include('student.new-classes', ['courses' => $springCourses])

    </div>
  </div>
  <div class="col-md-12">
      <div class="box box-warning">
          <div class="box-header">
              <h4>Fall semester classes</h4>
          </div>
          @include('student.new-classes', ['courses' => $fallCourses])
      </div>
  </div>
@endsection
