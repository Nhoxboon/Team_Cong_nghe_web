<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Trang Tin Tức'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!--    <link rel="stylesheet" href="/public/css/style.css">-->
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">Trang Tin Tức</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Trang Chủ</a>
                    </li>
                    <?php foreach ($categories as $category): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/category/<?php echo $category['id']; ?>">
                                <?php echo htmlspecialchars($category['name']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <?php if (!isset($_SESSION['user'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Đăng Nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">Đăng Ký</a>
                        </li>
                    <?php else: ?>
                        <?php if ($_SESSION['user']['role'] == 1): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/admin">Trang Quản Trị</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Đăng Xuất</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main class="container mt-4"><?php