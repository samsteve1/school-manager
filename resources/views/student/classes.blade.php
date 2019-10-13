<?php $count = 1; ?>
<div class="box-body table-responsive">

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Title</th>
                <th>Teacher in charge</th>
            </tr>
            @if (!$courses->count())

                        <p class="text-danger">You've not enrolled in any class this for this semester.</p>

            @endif
        </thead>
        <tbody>
            @foreach ($courses as $class)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ strtoupper($class->code) }}</td>
                    <td>{{ ucwords($class->title) }}</td>
                    <td>
                        {{ $class->teacher->count() ? $class->teacher->first()->fullName() : 'Unavailable yet.' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
