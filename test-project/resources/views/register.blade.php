<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/stylesheet_login.css')}}">
    <link rel="stylesheet" href="{{asset('css/eye.css')}}">

    <script>
    const password = document.querySelector("input");
    const btn_show = document.querySelector("span");
    btn_show.addEventListener("click", function() {
        if (password.type === "password") {
            password.type = "text";
            btn_show.classList.add("hide");
        } else {
            password.type = "password";
            btn_show.classList.add("hide");
        }
    })
    </script>

</head>

<body>
    <section class="Form my-1 mx-5">
        <div class="container">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-lg-5 text-center">
                    <h3 class="login mb-4">Register User</h3>
                    <form method="POST" action="">
                        @csrf
                        <div class="form-row">
                            <div class="col-lg-12">
                                <!-- Username -->
                                <input type="text" class="form-control my-3 p-3" name="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-12">
                                <!-- Name -->
                                <input type="text" class="form-control my-3 p-3" name="name" placeholder="Name" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-12 position-relative">
                                <!-- Password -->
                                <input id="password-field" type="password" class="form-control my-3 p-3" name="password" placeholder="Password" required>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle position-absolute" style="right: 20px; top: 15px; cursor: pointer;" onclick="togglePassword()"></span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-12">
                                <!-- Submit button -->
                                <button  type="submit" class="btn btn-primary mb-4">Register</button>
                            </div>
                        </div>
                        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password-field");
            var toggleIcon = document.querySelector(".toggle");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }
    </script>
</body>



</html>