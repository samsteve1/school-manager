<?php $count = 1; ?>
@extends('account.layouts.master')

@section('account_content_sub_header')
    Students
@endsection

@section('account_content_box_title')
    {{ $student->fullName() }}
@endsection

@section('account_content_box_body')
    <div class="col-md-4">
            <div class="box box-primary">
                    <div class="box-body box-profile">
                      <img class="profile-user-img img-responsive img-circle" src="{{ $student->avatar }}" alt="User profile picture">

                      <h3 class="profile-username text-center">{{ $student->fullName() }}</h3>

                      <p class="text-muted text-center">
                          {{-- @foreach ($roles as $role)
                            {{ ucwords($role->name) }} {{ $roles[$roles->count() -1 ]->name == $role->name ? '' : ', ' }}
                          @endforeach --}}
                      </p>

                      <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                          <b>e-Mail Address</b> <a class="pull-right">{{ $student->email }}</a>
                        </li>
                        <li class="list-group-item">
                          <b>Gender</b> <a class="pull-right">{{ ucwords($student->gender) }}</a>
                        </li>
                        <li class="list-group-item">
                          <b>Joined</b> <a class="pull-right">{{ $student->created_at->format('D, d/M/Y') }}</a>
                        </li>
                      </ul>

                    </div>
                    <!-- /.box-body -->
                  </div>
    </div>
    <div class="col-md-8">
        <div class="box box-success">
            <div class="box-header">
                Classes enrolled in: <span class="label label-info">{{ $student->courses->count() }}</span>
            </div>
            <div class="box-body">
                @if (!$student->courses->count())
                    <p>{{ $student->name }} is yet to enroll in any class.</p>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Title</th>
                                <th>Semester</th>
                                <th>Teacher in charge</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student->courses as $class)
                               <tr>
                                   <td>{{ $count++ }}</td>
                                   <td>{{ strtoupper($class->code) }}</td>
                                   <td>{{ ucwords($class->title) }}</td>
                                   <td>{{ ucfirst($class->semesters->first()->type) }}</td>
                                   <td>{{ $class->teacher->count() ? $class->teacher->first()->fullName() : 'None assigned yet' }}</td>

                               </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
