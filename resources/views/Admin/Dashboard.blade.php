@extends('Layouts.Header')
@section('title', 'QuizKeeper')

@section('content')
<div class="container">
    {{-- <h2>Uploaded Files</h2> --}}
    <div class="mb-3 d-flex justify-content-end">
        <button type="button" class="btn btn-danger mr-2" data-bs-toggle="modal"
            data-bs-target="#deleteConfirmationModal">Delete All</button>

        <button class="btn btn-primary mr-2">Download</button>
        <button type="button" class="btn btn-success mr-2" data-bs-toggle="modal"
            data-bs-target="#backupConfirmationModal">Backup to Server</button>

    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Computer Name</th>
                <th scope="col">Size</th>
                <th scope="col">Date and Time Uploaded</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($all_computers as $computer)
            <tr>
                <td>{{ $computer->name }}</td>
                <td>
                    @foreach($computer->files as $file)
                    {{ $file->size }} MB<br>
                    @endforeach
                </td>
                <td>
                    @foreach($computer->files as $file)
                    {{ $file->created_at->format('d F Y, H:i') }}<br>
                    @endforeach
                </td>
                <td>
                    @foreach($computer->files as $file)
                    {{-- <form action="{{ route('delete.file', $file->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>
                    </form> --}}
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Backup Confirmation Modal -->
<div class="modal fade" id="backupConfirmationModal" tabindex="-1" aria-labelledby="backupConfirmationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="backupConfirmationModalLabel">Backup Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="course" class="form-label">Course</label>
                    <select class="form-select" id="course">
                        <option selected>Select Course</option>
                        <option value="course1">Course 1</option>
                        <option value="course2">Course 2</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-select" id="type">
                        <option selected>Select Type</option>
                        <option value="type1">Quiz 1</option>
                        <option value="type2">Quiz 2</option>
                        <option value="type2">Mid Exam</option>
                        <option value="type2">Final Exam</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="class" class="form-label">Class</label>
                    <input type="text" class="form-control" id="class">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success">Backup</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete all answer?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>
@endsection
