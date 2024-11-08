<!DOCTYPE html>
<html lang="en">

<head>
    @include('Partials.HeadPackage')
    <link rel="stylesheet" href="{{ asset('assets/css/SignInPage.css') }}">
</head>

<body>
    <section id="sign-in-page">
        <div class="wrapper">
            <div class="sign-in-page-container">
                <div class="sign-in-form-container">
                    <div class="sign-in-form-header">
                        <h5>Sign In</h5>
                        <p>or <a href="{{ route('sign.up.page') }}">Sign Up</a></p>
                    </div>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="field-con">
                            <input type="email" name="email" placeholder="Enter email" required>
                        </div>
                        <div class="field-con">
                            <i class="bi bi-eye-slash togglePassword"></i>
                            <input type="password" name="password" placeholder="Enter password" required>
                        </div>
                        <div class="form-btn-container">
                            <button type="submit" name="submit" class="btn">Sign In</button>
                        </div>
                    </form>
                    <a href="#" class="forgot-password-btn">Forgot Password?</a>
                </div>
                <div class="sign-in-page-side-content">
                    <div class="sign-in-page-content">
                        <h2>Morning Brew</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus perspiciatis officia
                            inventore consectetur ut debitis quisquam error veniam explicabo. Aperiam?</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('Partials.Script')
    @include('Partials.Toastr')
</body>

</html>
