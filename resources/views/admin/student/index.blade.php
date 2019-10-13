<?php $count = 1; ?>
@extends('account.layouts.master')

@section('account_content_sub_header')
    Students
@endsection

@section('account_content_box_title')
    All students: <strong>{{ $studentCount}}</strong>
@endsection

@section('account_content_box_body')
<div class="col-md-10 col-md-offset-1">
    <div class="box table-responsive">
       <table class="table table-striped table-hover">
            <thead>
                    <tr>
                        <th>#</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Gender</th>
                        <th>Email address</th>
                    </tr>
                    @if (!$students->count())
                        <p>No student enrolled yet.</p>
                    @endif
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td><a href="{{ route('admin.student.show', $student) }}">{{ $student->firstName() }}</a></td>
                            <td><a href="{{ route('admin.student.show', $student) }}">{{ $student->lastName() }}</a></td>
                            <td>{{ ucfirst($student->gender) }}</td>
                            <td>{{ $student->email }}</td>
                        </tr>
                    @endforeach

                </tbody>
       </table>
       <div class="box-footer">
          {{ $students->links() }}
       </div>
    </div>
</div>
@endsection
