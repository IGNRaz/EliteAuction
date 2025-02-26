<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(45deg, #28a745, #ffffff);
            color: #333;
            height: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding: 20px;
            background-attachment: fixed;
            animation: backgroundAnimation 3s ease-in-out infinite;
        }

       

        .navbar {
            background: linear-gradient(45deg, #218838, #1e7e34);
            width: 100%;
        }

        .navbar-brand, .nav-link {
            color: #fff !important;
            font-size: 1.2rem;
        }

        .form-container {
            max-width: 500px;
            margin: 30px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            font-size: 1.8rem;
            color: #28a745;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 10px;
            border-color: #28a745;
            padding: 12px;
            font-size: 1rem;
        }

        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
            font-size: 1.1rem;
            width: 100%;
            padding: 12px;
        }

        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .footer {
            background: linear-gradient(45deg, #28a745, #218838);
            color: #fff;
            padding: 15px 0;
            font-size: 1.2rem;
            width: 100%;
            text-align: center;
        }

        .forgot-password {
            text-align: center;
            margin-top: 15px;
        }

        .forgot-password a {
            color: #28a745;
            font-size: 1rem;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#"><i class="fas fa-gavel"></i> موقع المزاد</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> إنشاء حساب</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Form Container -->
    <div class="form-container">
        <h2><i class="fas fa-sign-in-alt"></i> تسجيل الدخول</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> البريد الإلكتروني</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="أدخل بريدك الإلكتروني" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="password"><i class="fas fa-lock"></i> كلمة المرور</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="أدخل كلمة المرور" required>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('تذكرني') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('هل نسيت كلمة السر؟') }}
                    </a>
                @endif

                <button type="submit" class="btn btn-primary ms-3">
                    {{ __('تسجيل الدخول') }}
                </button>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 موقع المزاد. جميع الحقوق محفوظة. <i class="fas fa-copyright"></i></p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
