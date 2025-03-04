</html>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>موقع المزاد - لوحة التحكم</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            color: #333;
            direction: rtl;
            margin: 0;
            padding: 0;
            font-family: 'Tajawal', sans-serif;
        }
        .navbar {
            background-color: #2d6a4f;
            padding: 15px 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .navbar-brand {
            color: white;
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            width: 100%;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            right: 0;
            width: 220px;
            background-color: #1b4332;
            color: white;
            padding-top: 20px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }
        .sidebar h4 {
            text-align: center;
            margin-bottom: 45px;
            font-size: 1.5rem;
        }
        .sidebar a {
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            display: flex;
            align-items: center;
            margin: 5px 0;
            border-radius: 5px;
            transition: background 0.3s ease;
            width: 100%;
            font-size: 0.9rem;
        }
        .sidebar a:hover {
            background-color: #2d6a4f;
        }
        .sidebar i {
            font-size: 1.5rem;
            margin-left: 12px;
        }
        .sidebar .text {
            text-align: right;
            flex-grow: 1;
            margin-right: 10px
        }
        .content {
            margin-right: 220px;
            padding: 20px;
        }
        .card {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        .card-body {
            text-align: center;
            padding: 15px;
        }
        .card-body h5 a {
            color: #1b4332;
            font-size: 1.1rem;
        }
        .card-body i {
            font-size: 2.3rem;
            color: #2d6a4f;
            margin-bottom: 10px;
        }
        .logout-btn {
            padding: 10px;
            font-size: 1rem;
            cursor: pointer;
            text-align: center;
            transition: background 0.3s ease;
            margin-bottom: 20px;
            margin-left: 40px;
            margin-right: 10px;
            background-color: transparent;
            color: wheat;
        }
        .logout-btn:hover {
            background-color: #c9302c;
            color: white;
        }
        .logout-btn i {
            margin-left: 8px;
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                padding-top: 20px;
            }
            .content {
                margin-right: 0;
            }
            .card {
                margin-bottom: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="{{route("home")}}">الصفحة الرئيسية <i class="fas fa-gavel"></i></a>
        <
    </nav>
