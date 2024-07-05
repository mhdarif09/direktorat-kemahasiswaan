<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="auth-container">
        <div class="auth-form">
            <h2>Register</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required>
                </div>
                <div class="form-group">
                    <label for="student_number">Student Number</label>
                    <input type="text" name="student_number" id="student_number" required>
                </div>
                <div class="form-group">
                    <label for="course">Course</label>
                    <input type="text" name="course" id="course" required>
                </div>
                <div class="form-group">
                    <button type="submit">Register</button>
                </div>
                <div class="form-group">
                    <a href="{{ route('login') }}">Already have an account? Login</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
