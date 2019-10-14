@extends('account.layouts.master')

@section('account_content_sub_header')
    Account home page
@endsection

@section('account_content_box_title')
    Welcome, {{ auth()->user()->firstName() }}.
@endsection
