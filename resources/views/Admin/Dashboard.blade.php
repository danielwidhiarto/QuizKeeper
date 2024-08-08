@extends('Components.Header')
@section('title', 'QuizKeeper')

@section('content')
<div class="container">
    <h2 class="mt-4">File Management</h2>

    <!-- Display success message -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Filter Section -->
    <div class="row mt-3">
        <div class="col-md-3">
            <select id="filterTerms" class="form-select">
                <option value="Odd Semester 2024/2025" selected>Odd Semester 2024/2025</option>
                <option value="Even Semester 2024/2025">Even Semester 2024/2025</option>
                <option value="Compact Semester 2025">Compact Semester 2025</option>
            </select>
        </div>
        <div class="col-md-2">
            <input type="date" id="filterDate" class="form-control" placeholder="Filter by Exam Date">
        </div>
        <div class="col-md-3">
            <select id="filterSubject" class="form-select">
                <option value="">Subject</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->subject_code }}">{{ $subject->subject_code }} - {{ $subject->subject_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <select id="filterExamType" class="form-select">
                <option value="">Exam Type</option>
                <option value="Assignment">Assignment</option>
                <option value="Mid Exam">Mid Exam</option>
                <option value="Final Exam">Final Exam</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="col-md-2">
            <button id="filterButton" class="btn btn-primary">Apply Filters</button>
        </div>
    </div>

    <table class="table table-bordered mt-4" id="transactionTable">
        <thead>
            <tr>
                <th>Exam Type</th>
                <th>Subject Code</th>
                <th>Subject Name</th>
                <th>Exam Date</th>
                <th>Exam Time</th>
                <th>Class</th>
                <th>Room</th>
                <th>Proctoring Assistant</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
            <tr data-id="{{ $transaction->id }}" data-subject="{{ $transaction->subject_code }}" data-date="{{ \Carbon\Carbon::parse($transaction->exam_date)->format('Y-m-d') }}" data-exam-type="{{ $transaction->exam_type }}" data-terms="{{ $transaction->exam_terms }}">
                <td>{{ $transaction->exam_type }}</td>
                <td>{{ $transaction->subject_code }}</td>
                <td>{{ $subjects[$transaction->subject_code]->subject_name ?? '' }}</td>
                <td>{{ \Carbon\Carbon::parse($transaction->exam_date)->format('Y-m-d') }}</td>
                <td>
                    {{ \Carbon\Carbon::parse($transaction->exam_start_time)->format('H:i') }} -
                    {{ \Carbon\Carbon::parse($transaction->exam_start_time)->addMinutes($transaction->exam_duration)->format('H:i') }}
                </td>
                <td>{{ $transaction->class }}</td>
                <td>{{ $transaction->room }}</td>
                <td>{{ $transaction->assistant_initial }} {{ $transaction->assistant_initial2 }}</td>
                <td>
                    <a href="{{ route('download_backup_file', $transaction->id) }}" class="btn btn-primary">
                        <i class="bi bi-download"></i>
                    </a>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $transaction->id }}">
                        <i class="bi bi-trash"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

<!-- Modals for each transaction -->
@foreach ($transactions as $transaction)
<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal-{{ $transaction->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $transaction->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel-{{ $transaction->id }}">Delete Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this backup file?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('delete_backup_file', $transaction->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
</div>

<script>
    document.getElementById('filterButton').addEventListener('click', function() {
        const filterDate = document.getElementById('filterDate').value;
        const filterSubject = document.getElementById('filterSubject').value;
        const filterExamType = document.getElementById('filterExamType').value;
        const filterTerms = document.getElementById('filterTerms').value;
        const rows = document.querySelectorAll('#transactionTable tbody tr');

        rows.forEach(row => {
            const subject = row.getAttribute('data-subject');
            const date = row.getAttribute('data-date');
            const examType = row.getAttribute('data-exam-type');
            const terms = row.getAttribute('data-terms');

            const matchesSubject = filterSubject === '' || subject === filterSubject;
            const matchesDate = filterDate === '' || date === filterDate;
            const matchesExamType = filterExamType === '' || examType === filterExamType;
            const matchesTerms = filterTerms === '' || terms === filterTerms;

            if (matchesSubject && matchesDate && matchesExamType && matchesTerms) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endsection
