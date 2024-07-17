@extends('Components.Header')
@section('title', 'QuizKeeper')

@section('content')
<div class="container">
    <h2 class="mt-4">File Management</h2>

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
                <th>Download File</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
            <tr data-id="{{ $transaction->id }}" data-subject="{{ $transaction->subject_code }}" data-date="{{ \Carbon\Carbon::parse($transaction->exam_date)->format('Y-m-d') }}" data-exam-type="{{ $transaction->exam_type }}" data-terms="{{ $transaction->exam_terms }}" data-bs-toggle="modal" data-bs-target="#actionModal-{{ $transaction->id }}">
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
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

<!-- Modals for each transaction -->
@foreach ($transactions as $transaction)
<div class="modal fade" id="actionModal-{{ $transaction->id }}" tabindex="-1" aria-labelledby="actionModalLabel-{{ $transaction->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="actionModalLabel-{{ $transaction->id }}">Details for {{ $transaction->subject_code }} - {{ $subjects[$transaction->subject_code]->subject_name ?? '' }} - {{ \Carbon\Carbon::parse($transaction->exam_date)->format('Y-m-d') }} - {{ $transaction->class }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Exam Terms:</strong> {{ $transaction->exam_terms }}</p>
                <p><strong>Exam Type:</strong> {{ $transaction->exam_type }}</p>
                <p><strong>Subject Code:</strong> {{ $transaction->subject_code }}</p>
                <p><strong>Subject Name:</strong> {{ $subjects[$transaction->subject_code]->subject_name ?? '' }}</p>
                <p><strong>Exam Date:</strong> {{ \Carbon\Carbon::parse($transaction->exam_date)->format('Y-m-d') }}</p>
                <p><strong>Exam Time:</strong> {{ \Carbon\Carbon::parse($transaction->exam_start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($transaction->exam_start_time)->addMinutes($transaction->exam_duration)->format('H:i') }}</p>
                <p><strong>Exam Duration:</strong> {{ $transaction->exam_duration }} minutes</p>
                <p><strong>Class:</strong> {{ $transaction->class }}</p>
                <p><strong>Room:</strong> {{ $transaction->room }}</p>
                <p><strong>Proctoring Assistant 1:</strong> {{ $transaction->assistant_initial }}</p>
                <p><strong>Proctoring Assistant 2:</strong> {{ $transaction->assistant_initial2 }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
