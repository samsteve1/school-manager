<?php $count = 1; ?>

@extends('account.layouts.master')

@section('account_content_sub_header')
    Session < semester
@endsection

@section('account_content_box_title')
    {{ $semester->session->year }} {{ $semester->type }} semester <span class="label {{ $semester->active ? ' label-success' : ' label-danger' }}">{{ $semester->active ? 'Active' : 'Ended' }}</span>
@endsection

@section('account_content_box_body')
    <div class="col-md-6 col-md-offset-1">
        <div class="box box-info table-responsive no-padding">
            <div class="box-header">
                    <p>Classes this semester {{ $courses->count() }}</p>

            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Code</th>
                        <th>Title</th>
                        <th>Students enrolled</th>
                        <th>Teacher in charge</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($courses->count())
                        @foreach ($courses as $course)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ strtoupper($course->code) }}</td>
                                <td>{{ ucwords($course->title) }}</td>
                                <td>{{ $course->users->count() }}</td>
                                <td>{{ $course->teacher()->count() ?  $course->teacher->first()->fullName()  : 'None assigned yet' }}</td>
                            </tr>
                        @endforeach
                    @else
                        <div class="box-body">
                                <p class="text-warning">No class added to this semester yet. </p>
                        </div>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-3">
        <div class="box box-success">
                <div class="box-header">
                        <p>Semester summary</p>

                </div>
            <div class="box-body">
                <table class="table-responsive semester-table">
                    <tbody>
                        <tr>
                            <td class="has"><span class="label label-light text-black">Session:</span></td>
                            <td> <span class="label label-light text-black">{{ $semester->session->year }}</span></td>
                        </tr>
                        <tr>
                            <td><span class="label label-light text-black">Semester type:</span></td>
                            <td><span class="label label-light text-black">{{ ucfirst($semester->type) }}</span></td>
                        </tr>
                        <tr>
                            <td><span class="label label-light text-black">Status:</span></td>
                            <td><span class="label label-light text-black">{{ $semester->active ? 'Active' : 'Ended' }}</span></td>
                        </tr>
                        <tr>
                            <td><span class="label label-light text-black">Number of classes:</span></td>
                            <td><span class="label label-light text-black">{{ $semester->courses->count() }}</span></td>
                        </tr>
                        <tr>
                            <td><span class="label label-light text-black">Students enrolled:</span></td>
                            <td><span class="label label-light text-black">{{ $semester->students() }}</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
