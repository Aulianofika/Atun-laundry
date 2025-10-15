<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title','Login')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #ffe4ec, #fff7fa);
      font-family: 'Outfit', 'Segoe UI', sans-serif;
    }

    .auth-card {
      max-width: 400px;
      margin: 80px auto;
      padding: 35px 30px;
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 6px 20px rgba(255, 133, 162, 0.15);
      transition: all 0.3s ease;
    }

    .auth-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 8px 25px rgba(255, 133, 162, 0.2);
    }

    .text-pink {
      color: #d63384 !important;
    }
    .text-pink-hover:hover {
      color: #ff4d7a !important;
    }

    .btn-pink {
      background: linear-gradient(135deg, #ff85a2, #ff4d7a);
      border: none;
      color: white;
      border-radius: 12px;
      transition: all 0.3s ease;
    }
    .btn-pink:hover {
      background: linear-gradient(135deg, #ff6b8e, #ff3b6a);
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(255, 77, 122, 0.3);
    }

    .input-soft {
      border: 1px solid #f7d2dc;
      border-radius: 10px;
      background-color: #fffafc;
      transition: 0.3s;
    }
    .input-soft:focus {
      border-color: #ff85a2;
      box-shadow: 0 0 6px rgba(255,133,162,0.3);
    }

    a {
      color: #d63384;
      transition: color 0.2s ease;
    }
    a:hover {
      color: #ff4d7a;
    }

    @media (max-width: 576px) {
      .auth-card {
        margin: 40px 15px;
        padding: 25px;
      }
    }
  </style>
</head>
<body>

<div class="auth-card">
  @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
