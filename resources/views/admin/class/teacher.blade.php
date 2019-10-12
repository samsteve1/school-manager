<?php $count = 1; ?>
@extends('account.layouts.master')

@section('account_content_sub_header')
    Teachers
@endsection

@section('account_content_box_title')
    Assign Teachers to classes, {{ $activeSession->year }} Spring and Fall Semesters.
@endsection

@section('account_content_box_body')
    <div class="col-md-12">
      <div class="box info">
          <div class="box-header">
               <h4> Spring semester classes</h4>
          </div>
          @include('admin.class.classes', ['courses' => $springCourses])

      </div>
    </div>
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header">
                <h4>Fall semester classes</h4>
            </div>
            @include('admin.class.classes', ['courses' => $fallCourses])
        </div>
    </div>
@endsection
