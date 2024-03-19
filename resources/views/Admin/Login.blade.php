@extends('Components.Particles')

@section('title', 'QuizKeeper')

@section('content')

<div class="card" style="width: 350px; height: 340px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2;">
    <div class="card-body">
        <img src="{{ asset('images/ribbon.png') }}" class="card-img-top" alt="Ribbon Picture" style="width: 42px; height: 128px;">
        <img src="{{ asset('images/binus2.png') }}" class="card-img-top" alt="Binus Picture" style="width: 164px; height: 112px; margin-left: 16px;">
        <form action="{{ route('admin_login') }}" method="POST">
            @csrf
        <div class = "mt-3">
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <button type="button" class="btn btn-outline-secondary" id="showPasswordButton">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary" style="background-color: rgb(0, 169, 226); font-weight: bold;">Login</button>
        </div>
        </form>
    </div>
</div>


<script>
    // Toggle password visibility
    document.getElementById("showPasswordButton").addEventListener("click", function() {
        var passwordInput = document.getElementById("password");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    });
</script>
@endsection
