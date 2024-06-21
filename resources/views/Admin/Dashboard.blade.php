@extends('Layouts.Header')
@section('title', 'QuizKeeper')

@section('content')
<div class="container">
    <h2>Uploaded Files</h2>
    <div class="mb-3 d-flex justify-content-end">
        <button type="button" class="btn btn-danger mr-2" data-bs-toggle="modal"
            data-bs-target="#deleteAllConfirmationModal">Delete All</button>

        <button type="button" class="btn btn-primary mr-2" data-bs-toggle="modal"
            data-bs-target="#downloadAllConfirmationModal">Download All</button>

        <button type="button" class="btn btn-success mr-2" data-bs-toggle="modal"
            data-bs-target="#backupConfirmationModal">Backup to Server</button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Computer Name</th>
                <th scope="col">Size (KB) </th>
                <th scope="col">Date and Time Uploaded</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($all_computers as $computer)
                <tr class="{{ $computer->files->isEmpty() ? 'table-danger' : 'table-success' }}"
                    style="margin-bottom: 5px;">
                    <td>{{ $computer->name }}</td>
                    <td>
                        @foreach($computer->files as $file)
                            {{ round($file->size) }}
                        @endforeach
                    </td>
                    <td>
                        @foreach($computer->files as $file)
                            {{ $file->updated_at->format('d F Y, H:i') }}<br>
                        @endforeach
                    </td>
                    <td>
                        @foreach($computer->files as $file)
                            <a href="{{ route('download_file', $file->id) }}" class="btn btn-outline-primary">
                                <i class="bi bi-download"></i>
                            </a>
                            <!-- Delete icon with form to delete the file -->
                            <form action="{{ route('delete_file', $file->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteConfirmationModal">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Backup All Confirmation Modal -->
<div class="modal fade" id="backupConfirmationModal" tabindex="-1" aria-labelledby="backupConfirmationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="backupConfirmationModalLabel">Backup Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('backup_all_files') }}" method="POST">
                @csrf
                <div class="modal-body">
                <div class="mb-3">
    <label for="subject_select" class="form-label">Select Subject</label>
    <select class="form-control" id="subject_select">
        <option value="" selected>Select Subject</option>
        @foreach($all_subjects as $subject)
            <option value="{{ $subject->subject_code }}">{{ $subject->subject_code }} - {{ $subject->subject_name }}</option>
        @endforeach
    </select>
</div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select class="form-select" id="type" name="type" required>
                            <option selected>Select Type</option>
                            <option value="Quiz 1">Quiz 1</option>
                            <option value="Quiz 2">Quiz 2</option>
                            <option value="Mid Exam">Mid Exam</option>
                            <option value="Final Exam">Final Exam</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="class" class="form-label">Class</label>
                        <input type="text" class="form-control" id="class" name="class" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Backup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete All Confirmation Modal -->
<div class="modal fade" id="deleteAllConfirmationModal" tabindex="-1" aria-labelledby="deleteAllConfirmationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAllConfirmationModalLabel">Delete Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete all files?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('delete_all_files') }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete All</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Download All Confirmation Modal -->
<div class="modal fade" id="downloadAllConfirmationModal" tabindex="-1"
    aria-labelledby="downloadAllConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="downloadAllConfirmationModalLabel">Download Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to download all files as a ZIP archive?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('download_all_files') }}" method="GET" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-primary">Download All</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    $(document).ready(function() {
        $('#subject_select').select2({
            placeholder: 'Select Subject',
            allowClear: true, // Optional, enables clear button
            minimumInputLength: 1, // Minimum characters before searching
            width: '100%', // Adjust the width as needed
            dropdownAutoWidth: true // Auto-adjust dropdown width to match input width
        });
    });
</script>