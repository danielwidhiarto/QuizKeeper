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
                <th>Exam StartTime - ExamEndTime</th>
                <th>Class</th>
                <th>Room</th>
                <th>Proctoring Assistant</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Assignment</td>
                <td>COMP1345</td>
                <td>Intro to Computer Science</td>
                <td>2024-06-25</td>
                <td>08:00 - 10:00</td>
                <td>BB10</td>
                <td>BMCA0314</td>
                <td>John Doe</td>
                <td>wrench icon bootstrap</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
