<?php $count = 1; ?>
<div class="box-body table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Title</th>
                <th>Students enrolled</th>
                <th>Teacher in assigned</th>
            </tr>
            @if (!$courses->count())
                <tr>
                    <td> No classes added to this semester yet.</td>
                </tr>
            @endif
        </thead>
        <tbody>
            @foreach ($courses as $class)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td><a href="{{ route('admin.class.show', $class) }}">{{ strtoupper($class->code) }}</a></td>
                    <td><a href="{{ route('admin.class.show', $class) }}">{{ ucwords($class->title) }}</a></td>
                    <td>{{ $class->users->count() }}</td>
                    <td>{{ $class->teacher->count() ? $class->teacher->first()->fullName() : 'None assigned yet' }}</td></td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>
