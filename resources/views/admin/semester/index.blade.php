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
        <p>Classes this semester {{ $courses->count() }}</p>
        <div class="box box-info table-responsive no-padding">
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
                                <td>{{ toUpper($course->code) }}</td>
                                <td>{{ ucwords($courses->title) }}</td>
                                <td>{{ $courses->users->count() }}</td>
                                <td>X</td>
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

    </div>
@endsection
