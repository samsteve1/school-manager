@extends('account.layouts.master')

@section('account_content_sub_header')
    Staff
@endsection

@section('account_content_box_title')
    {{ $staff->fullName() }}
@endsection

@section('name')

@endsection
