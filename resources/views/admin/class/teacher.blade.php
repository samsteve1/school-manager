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
          <div class="box-body">
                <table class="table table-responsive table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Title</th>
                            <th>Teacher in charge</th>
                            <th>Assign new teacher</th>
                        </tr>
                        @if (!$springCourses->count())
                            <tr>
                                <td>
                                    No classes added to this semester yet.
                                </td>
                            </tr>
                        @endif
                    </thead>
                    <tbody>
                        @foreach ($springCourses as $class)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ strtoupper($class->code) }}</td>
                                <td>{{ ucwords($class->title) }}</td>
                                <td>
                                    {{ $class->teacher->count() ? $class->teacher->first()->fullName() : 'None assigned yet' }}</td>
                                <td>
                                    @include('admin.class.new-teacher-form', compact(['teachers', 'class']))
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
          </div>
      </div>
    </div>
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header">
                <h4>Fall semester classes</h4>
            </div>
        </div>
    </div>
@endsection
