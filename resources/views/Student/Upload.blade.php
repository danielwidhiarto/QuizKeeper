@extends('Layouts.Particles')

@section('title', 'QuizKeeper')

@section('content')
<div class="container" style="position: absolute; z-index: 100;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload ZIP File</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('fileDetails'))
                        <div class="alert alert-info" role="alert">
                            <strong>File Details:</strong><br>
                            Name: {{ session('fileDetails.name') }}<br>
                            Size: {{ round(session('fileDetails.size') / 1024, 2) }} KB<br>
                            Uploaded At: {{ session('fileDetails.uploaded_at') }}
                        </div>
                    @endif

                    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="file">Select ZIP file:</label>
                            <input type="file" class="form-control-file" id="file" name="file">
                            @error('file')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
