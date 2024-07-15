@extends('Components.Particles')

@section('title', 'QuizKeeper')

@section('content')
    <div class="container" style="position: absolute; z-index: 100;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload Backup Answer</div>

                    <div class="card-body">
                        <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                            @csrf

                            <div class="form-group">
                                <label for="file">Select ZIP file:</label>
                                <input type="file" class="form-control-file" id="file" name="file">
                                @error('file')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <br>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary" id="uploadButton">
                                    <span id="buttonText">Upload</span>
                                    <div id="spinner" class="spinner-border spinner-border-sm" role="status"
                                        style="display: none;">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </button>
                            </div>
                        </form>

                        @if (session('success'))
                        <br>
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

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("uploadForm").addEventListener("submit", function() {
            document.getElementById("buttonText").style.display = "none";
            document.getElementById("spinner").style.display = "inline-block";
        });
    </script>

@endsection
