@extends('Components.ParticlesUpload')

@section('title', 'QuizKeeper')

@section('content')
    <style>
        /* Card Styles */
        .card {
            background-color: white;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
        }

        /* Form Label and Input Styles */
        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .text-danger {
            color: red;
            font-size: 0.9em;
        }

        /* Button Styles */
        .btn {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            width: 100%;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .spinner {
            display: none;
            margin-left: 10px;
        }

        .spinner.show {
            display: inline-block;
        }

        /* Alert Styles */
        .alert {
            padding: 10px;
            margin-top: 10px;
            border-radius: 4px;
            font-size: 0.9em;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }
    </style>
        <div class="card">
            <div class="card-header">Upload Backup Answer</div>

            <div class="card-body">
                <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                    @csrf

                    <div class="form-group">
                        <label for="file">Select ZIP file:</label>
                        <input type="file" id="file" name="file">
                        @error('file')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <br>

                    <div>
                        <button type="submit" class="btn" id="uploadButton">
                            <span id="buttonText">Upload</span>
                            <div id="spinner" class="spinner">
                                <span>Loading...</span>
                            </div>
                        </button>
                    </div>
                </form>

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
        </div>
    </div>

    <script>
        document.getElementById("uploadForm").addEventListener("submit", function() {
            document.getElementById("buttonText").style.display = "none";
            document.getElementById("spinner").classList.add("show");
        });
    </script>

@endsection
