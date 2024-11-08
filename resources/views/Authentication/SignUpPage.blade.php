<!DOCTYPE html>
<html lang="en">

<head>
    @include('Partials.HeadPackage')
    <link rel="stylesheet" href="{{ asset('assets/css/SignUpPage.css') }}">
</head>

<body>
    <section id="sign-up-page">
        <div class="wrapper">
            <div class="sign-up-page-container">
                <div class="sign-up-page-side-content">
                    <div class="sign-up-page-content">
                        <h2>Morning Brew</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus perspiciatis officia
                            inventore consectetur ut debitis quisquam error veniam explicabo. Aperiam?</p>
                    </div>
                </div>
                <div class="sign-up-form-container">
                    <div class="sign-up-form-header">
                        <h5>Sign Up</h5>
                        <p>or <a href="{{ route('sign.in.page') }}">Sign In</a></p>
                    </div>
                    <form action="" method="POST">
                        <div class="field-con">
                            <input type="text" name="username" placeholder="Enter username" required>
                        </div>
                        <div class="field-con">
                            <input type="email" name="email" placeholder="Enter email" required>
                        </div>
                        <div class="field-con">
                            <i class="bi bi-eye-slash togglePassword"></i>
                            <input type="password" name="password" placeholder="Enter password" required>
                        </div>
                        <div class="form-btn-container">
                            <button type="submit" name="submit" class="btn">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @include('Partials.Script')
    @include('Partials.Toastr')
</body>

</html>
