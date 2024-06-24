@extends('Layouts.Header')
@section('title', 'QuizKeeper')

@section('content')
<div class="container">
    <h2 class="mt-4">File Management</h2>
    <table class="table table-bordered mt-4">
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
            @foreach ($all_transactions as $transaction)
            <tr>
                <td data-bs-toggle="modal" data-bs-target="#actionModal-{{ $transaction->id }}">{{ $transaction->exam_type }}</td>
                <td data-bs-toggle="modal" data-bs-target="#actionModal-{{ $transaction->id }}">{{ $transaction->subject_code }}</td>
                <td data-bs-toggle="modal" data-bs-target="#actionModal-{{ $transaction->id }}">{{ $subjects[$transaction->subject_code]->subject_name ?? '' }}</td>
                <td data-bs-toggle="modal" data-bs-target="#actionModal-{{ $transaction->id }}">{{ \Carbon\Carbon::parse($transaction->exam_date)->format('Y-m-d') }}</td>
                <td data-bs-toggle="modal" data-bs-target="#actionModal-{{ $transaction->id }}">
                    {{ \Carbon\Carbon::parse($transaction->exam_start_time)->format('H:i') }} -
                    {{ \Carbon\Carbon::parse($transaction->exam_start_time)->addMinutes($transaction->exam_duration)->format('H:i') }}
                </td>
                <td data-bs-toggle="modal" data-bs-target="#actionModal-{{ $transaction->id }}">{{ $transaction->class }}</td>
                <td data-bs-toggle="modal" data-bs-target="#actionModal-{{ $transaction->id }}">{{ $transaction->room }}</td>
                <td data-bs-toggle="modal" data-bs-target="#actionModal-{{ $transaction->id }}">{{ $transaction->assistant_initial }}, {{ $transaction->assistant_initial2 }}</td>
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
    @foreach ($all_transactions as $transaction)
    <div class="modal fade" id="actionModal-{{ $transaction->id }}" tabindex="-1" aria-labelledby="actionModalLabel-{{ $transaction->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="actionModalLabel-{{ $transaction->id }}">Action for {{ $transaction->subject_code }} - {{ $subjects[$transaction->subject_code]->subject_name ?? '' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add your modal content here -->
                    <p>Details for the selected transaction can be shown or edited here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- Add more actions as needed -->
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
