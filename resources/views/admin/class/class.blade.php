<?php $count = 1; ?>
@extends('account.layouts.master')

@section('account_content_sub_header')
    Classes
@endsection

@section('account_content_box_title')
    {{ strtoupper($class->code) }}: {{ ucwords($class->title) }}
@endsection


@section('account_content_box_body')
    <div class="col-md-8">
        <div class="box box-info">
            <div class="box-header">
                <h4>Students enrolled in class</h4>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Gender</th>
                            <th>Email address</th>
                            <th>Remove</th>
                        </tr>
                        @if (!$class->users->count())
                            <tr>
                                No students enrolled in {{ ucwords($class->title) }} yet.
                            </tr>
                        @endif
                    </thead>
                    <tbody>
                        @foreach ($class->users as $user)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td><a href="{{ route('admin.student.show', $user) }}">{{ ucwords($user->firstName()) }}</a></td>
                                <td><a href="{{ route('admin.student.show', $user) }}">{{ ucwords($user->lastName()) }}</a></td>
                                <td>{{ ucwords($user->gender) }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <form action="{{ route('admin.class.student.remove', [$class, $user]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box box-success">
            <div class="box-header">
                <h4>Class summary</h4>
            </div>
            <div class="box-body">
                <table class="class-table">
                    <tr>
                        <td><span class="label label-white text-black">Class Code:</span></td>
                        <td><span class="label label-white text-black">{{strtoupper($class->code) }}</span></td>
                    </tr>
                    <tr>
                        <td><span class="label label-white text-black">Class Title:</span></td>
                        <td><span class="label label-white text-black">{{ ucwords($class->title) }}</span></td>
                    </tr>
                    <tr>
                        <td><span class="label label-white text-black">Number of Students:</span></td>
                        <td><span class="label label-white text-black">{{ $class->users->count() ? $class->users->count() : 'None' }}</span></td>
                    </tr>
                    <tr>
                        <td><span class="label label-white text-black">Teacher in charge:</span></td>
                        <td><span class="label label-white text-black"> {{ $class->teacher->count() ? $class->teacher->first()->fullName() : 'None assigned yet' }}</span></td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
@endsection
