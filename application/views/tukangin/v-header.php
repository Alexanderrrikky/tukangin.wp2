<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> 𝔗𝔲𝔨𝔞𝔫𝔤𝔦𝔫</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('asset/img/logo.png'); ?>" />
    <!-- Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url() ?>asset/css/style.css" rel=" stylesheet" />

    <!-- alpine -->
    <script src="//unpkg.com/alpinejs" defer></script>

</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <!-- <a class="navbar-brand" href="index.html">Start Bootstrap</a> -->
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="<?php echo base_url('asset/img/logo.png'); ?>" alt="Logo" width="30" height="28" class="d-inline-block align-text-top" />
                        𝔗𝔲𝔨𝔞𝔫𝔤𝔦𝔫
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-5">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() . 'tukangin' ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() . 'tukangin/about' ?>">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() . 'tukangin/contact' ?>">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() . 'tukangin/services' ?>">services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() . 'tukangin/blockHoom' ?>">Blog</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Portfolio</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                <li>
                                    <a class="dropdown-item" href="<?= base_url() . 'tukangin/overview' ?>">Portfolio Overview</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url() . 'tukangin/item' ?>">Portfolio Item</a>
                                </li>
                            </ul>
                        </li>

                        <!-- profile -->
                        <li class="dropdown ms-5">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></span>
                                <img class="img-profile rounded-circle ms-2" height="30" width="30" src="<?= base_url('asset/img/profile/') . $user['image']; ?>" />
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= base_url('tukangin/profile') ?>"><i class="bi bi-person-circle me-2"></i></i>profile</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('auth/logout') ?>"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>