<form action="{{ route('admin.class.teacher.assign', $class) }}" method="POST">
    @csrf
        <div class="row">
            <div class="col-md-9 inline-form-col">
                <select name="teacher"  class="form-control">
                    <option value="">Select teacher</option>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ ucwords($teacher->fullName()) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-1 inline-form-col">
                <button type="submit" class="btn btn-success  btn-sm" {{!$teachers->count() ? 'disabled' : ''  }} >Assign</button>
            </div>
        </div>
    </form>
