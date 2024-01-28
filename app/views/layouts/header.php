<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kendra IT CRM</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/build/header.css">
</head>
<body>
<div>
    <header id="masthead" class="site-header">
        <div class="site-header-absolute container">
            <div class="site-branding">
                <h1 class="site-title"><a href="<?= BASE_URL ?>" rel="home">KendraIT CRM</a></h1>
            </div>

            <nav id="site-navigation" class="main-navigation">
                <div class="mobile-menu">
                    <button class="burger-menu"><img src="<?= BASE_URL ?>public/assets/images/burger-icon.png"></button>
                    <button class="burger-menu-close"><img src="<?= BASE_URL ?>public/assets/images/close.png"></button>
                </div>
                <div class="menu-primary-menu-container">
                    <ul id="primary-menu" class="menu">
                        <li class="menu-item"><a href="clients">Client List</a></li>
                        <li class="menu-item"><a href="add-client">Add Client</a></li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="site-header-conditional container">
            <div class="menu-primary-menu-container">
                <ul id="primary-menu" class="menu">
                    <li class="menu-item"><a href="clients">Client List</a></li>
                    <li class="menu-item"><a href="add-client">Add Client</a></li>
                </ul>
            </div>
        </div>
    </header>