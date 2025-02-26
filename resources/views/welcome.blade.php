<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>موقع المزاد</title>
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
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            padding: 20px; /* تصغير المسافات */
            animation: backgroundAnimation 3s ease-in-out infinite;
        }

   

        .navbar {
            background: linear-gradient(45deg, #28a745, #218838);
            width: 100%;
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
            font-size: 1.2rem; /* تصغير حجم الخط */
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
            font-size: 1.1rem; /* تصغير حجم الخط */
        }
        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .stat-box {
            background-color: #fff;
            padding: 30px; /* تصغير padding */
            margin: 20px 0; /* تقليل المسافات */
            border-radius: 15px; /* تقليل نصف القطر */
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }
        .stat-box:hover {
            transform: scale(1.05); /* تقليل التكبير */
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }
        .scroll-container {
            flex-grow: 1;
            overflow-y: auto;
            padding-bottom: 50px; /* تقليل المسافة السفلية */
        }
        .footer {
            background: linear-gradient(45deg, #28a745, #218838);
            color: #fff;
            padding: 15px 0; /* تقليل padding */
            font-size: 1.2rem; /* تصغير حجم الخط */
            width: 100%;
            text-align: center;
        }
        .auction-btn {
            display: block;
            width: 250px; /* تصغير العرض */
            margin: 30px auto; /* تقليل المسافة العلوية والسفلية */
            padding: 12px; /* تقليل padding */
            font-size: 1.2rem; /* تصغير حجم الخط */
            text-align: center;
            background-color: #28a745;
            color: #fff;
            border-radius: 15px;
            transition: background 0.3s;
        }
        .auction-btn:hover {
            background-color: #218838;
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
                    <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> تسجيل الدخول</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> إنشاء حساب</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="scroll-container">
        <div class="container mt-4 text-center">
            <h1 class="display-4"><i class="fas fa-store"></i> مرحبًا بكم في موقع المزاد</h1>
            <p class="lead">استمتع بتجربة تسوق فريدة من خلال مشاركتك في المزادات الحية.</p>
            <a href="#" class="auction-btn">عرض المزادات</a>
        </div>

        <!-- Statistics Section -->
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="stat-box">
                        <h3><i class="fas fa-users"></i></h3>
                        <p>عدد المستخدمين: 10,000</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-box">
                        <h3><i class="fas fa-box"></i></h3>
                        <p>عدد المنتجات: 5,000</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-box">
                        <h3><i class="fas fa-gavel"></i></h3>
                        <p>عدد المزادات النشطة: 200</p>
                    </div>
                </div>
            </div>
        </div>
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
