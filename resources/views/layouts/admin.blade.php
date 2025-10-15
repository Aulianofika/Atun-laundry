<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 60px;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/admin/dashboard">Atun Laundry Admin</a>
        <form method="POST" action="/logout">
            @csrf
            <button class="btn btn-danger btn-sm" type="submit">Logout</button>
        </form>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar p-3">
            <h5 class="text-white">Menu</h5>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="/admin/dashboard" class="nav-link">Dashboard</a></li>
                <li class="nav-item"><a href="/admin/Customers" class="nav-link">Data Pelanggan</a></li>
                <li class="nav-item"><a href="/admin/services" class="nav-link">Layanan</a></li>
                <li class="nav-item"><a href="/admin/orders" class="nav-link">Pesanan</a></li>
                <li class="nav-item"><a href="/admin/promos" class="nav-link">Promo</a></li>
                <li class="nav-item"><a href="/admin/expenses" class="nav-link">Pengeluaran</a></li>
                <li class="nav-item"><a href="/admin/salaries" class="nav-link">Gaji Karyawan</a></li>
            </ul>
        </div>
        <div class="col-md-10 content">
            @yield('content')
        </div>
    </div>
</div>

</body>
</html>
