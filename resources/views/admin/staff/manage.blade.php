<?php $count = 1; ?>
@extends('account.layouts.master')

@section('account_content_sub_header')
    Staff
@endsection

@section('account_content_box_title')
    Manage Roles
@endsection

@section('account_content_box_body')
<div class="col-md-12">
        <div class="box box-info table-responsive">
           <table class="table table-striped table-hover">
                <thead>
                        <tr>
                            <th>#</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Gender</th>
                            <th>Email address</th>
                            <th>Designation</th>
                            <th>Assign role</th>

                        </tr>
                        @if (!$staffs->count())
                            <tr>
                                <td>
                                    <p class="text-danger">No staff hired yet.</p>
                                </td>
                            </tr>
                        @endif
                    </thead>
                    <tbody>
                        @foreach ($staffs as $staff)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $staff->firstName() }}</td>
                                <td>{{ $staff->lastName() }}</td>
                                <td>{{ ucfirst($staff->gender) }}</td>
                                <td>{{ $staff->email }}</td>
                                <td>
                                    @if ($staff->roles->count())

                                        @foreach ($staff->roles as $role)

                                            {{ ucwords($role->name) }} {{ $staff->roles[$staff->roles->count() -1 ]->name == $role->name ? '' : ', ' }}
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                        <form action="{{ route('admin.staff.manage.store', $staff) }}" method="POST">
                                                @csrf
                                                    <div class="row">
                                                        <div class="col-md-9 inline-form-col">
                                                            <select name="role"  class="form-control">
                                                                <option value="">Select role</option>
                                                                <option value="none">None (remove all roles)</option>
                                                                @foreach ($roles as $role)
                                                                    <option value="{{ $role->id }}">{{ ucwords($role->name) }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-1 inline-form-col">
                                                            <button type="submit" class="btn btn-success  btn-sm">Assign</button>
                                                        </div>
                                                    </div>
                                                </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
           </table>
           <div class="box-footer">
              {{-- {{ $students->links() }} --}}
           </div>
        </div>
    </div>
@endsection
