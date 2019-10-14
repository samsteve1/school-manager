<?php $count = 1;  ?>
@extends('account.layouts.master')

@section('account_content_sub_header')
    Classes
@endsection

@section('account_content_box_title')
    My classes
@endsection

@section('account_content_box_body')
    <div class="col-md-10 col-md-offset-1">
        <div class="box box-info table-responsive">
            <table class=" table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Code</th>
                        <th>Title</th>
                        <th>Semester</th>
                    </tr>
                    @if (!$classes->count())
                        <tr><p class="text-danger">You've not been assigned to any class yet.</p></tr>
                    @endif
                </thead>
                <tbody>
                    @foreach ($classes as $class)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ strtoupper($class->code) }}</td>
                            <td>{{ ucwords($class->title) }}</td>
                            <td>{{ ucfirst($class->semesters->first()->type) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
