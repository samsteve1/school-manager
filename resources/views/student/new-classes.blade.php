<div class="box-body table-responsive">

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Title</th>
                <th>Teacher in charge</th>
                <th>Enroll</th>
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
                        <form action="{{ route('student.classes.enroll.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="class" value="{{ $class->id }}">
                            <button type="submit" class="btn btn-block {{ $class->hasCurrentUser() ? 'btn-danger' : 'btn-success' }} btn-medium {{ $class->hasCurrentUser() ? 'disabled' : '' }}">{{ $class->hasCurrentUser() ? 'Enrolled' : 'Enroll' }}</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
