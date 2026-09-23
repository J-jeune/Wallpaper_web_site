<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — Wallpaper Web Site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .admin-sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #1a1a2e, #16213e);
            color: #fff;
        }
        .admin-sidebar a {
            color: #cfd8ea;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            border-radius: 8px;
            margin: 4px 10px;
            transition: 0.2s;
        }
        .admin-sidebar a:hover, .admin-sidebar a.active {
            background: rgba(255,255,255,0.1);
            color: #fff;
        }
        .admin-content {
            padding: 30px;
        }
        .stat-card {
            border-radius: 16px;
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="admin-sidebar" style="width: 250px;">
            <div class="p-3 fs-4 fw-bold border-bottom border-secondary">🏎️ Admin</div>
            <nav class="mt-3">
                <a href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2"></i> Tableau de bord</a>
                <a href="{{ route('products.index') }}"><i class="bi bi-image"></i> Produits</a>
                <a href="{{ route('categories.index') }}"><i class="bi bi-tags"></i> Catégories</a>
                <a href="{{ route('brands.index') }}"><i class="bi bi-award"></i> Marques</a>
                <a href="{{ route('users.index') }}"><i class="bi bi-people"></i> Utilisateurs</a>
                <a href="{{ route('orders.index') }}"><i class="bi bi-receipt"></i> Commandes</a>
                <hr class="text-secondary">
                <a href="/"><i class="bi bi-box-arrow-left"></i> Retour au site</a>
            </nav>
        </div>

        <div class="flex-grow-1">
            <div class="admin-content">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>