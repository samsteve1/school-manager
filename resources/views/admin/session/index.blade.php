<?php $count = 1;?>
@extends('account.layouts.master')
@section('account_content_sub_header')
    Academic sessions
@endsection

@section('account_content_box_title')
    All Sessions
@endsection

@section('account_content_box_body')
    <div class="col-md-6 col-md-offset-3">
            <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                                <tr>
                                        <th>#</th>
                                        <th>Year</th>
                                        <th>Status</th>
                                      </tr>
                        </thead>
                        <tbody>
                            @if ($sessions->count())
                                @foreach ($sessions as $session)
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>
                                            <div class="dropdown sidebar-dropdown">
                                                <button class="btn dropdown-toggle sidebar-button" type="button" data-toggle="dropdown">
                                                     {{ $session->year }}
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">

                                                    @each('admin.session.session-list', $session->semesters, 'semester')
                                                </ul>
                                            </div>
                                        </td>
                                        <td>{!! $session->active ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Ended</span>' !!}</td>
                                    </tr>

                                @endforeach
                            @else
                                <p class="text-warning">No Sessions created yet.</p>
                            @endif

                        </tbody>
                    </table>
            </div>
    </div>
@endsection

