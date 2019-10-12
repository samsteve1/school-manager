<div class="box-body table-responsive">

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Title</th>
                <th>Teacher in charge</th>
                <th>Assign new teacher</th>
            </tr>
            @if (!$courses->count())
                <tr>
                    <td>
                        No classes added to this semester yet.
                    </td>
                </tr>
            @endif
        </thead>
        <tbody>
            @foreach ($courses as $class)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ strtoupper($class->code) }}</td>
                    <td>{{ ucwords($class->title) }}</td>
                    <td>
                        {{ $class->teacher->count() ? $class->teacher->first()->fullName() : 'None assigned yet' }}</td>
                    <td>
                        @include('admin.class.new-teacher-form', compact(['teachers', 'class']))
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
