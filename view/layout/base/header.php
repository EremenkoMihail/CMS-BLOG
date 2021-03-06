<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="/view/layout/base/css/blog.css">

    <link rel="stylesheet" href="/view/layout/admin/css/dashboard.css">
    <script src="/view/layout/admin/css/dashboard.js"></script>
    <title><?=$title?></title>
</head>
<body>
<div class="container">
    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <?if ($login):?>
                        <?=$_SESSION['user']?>
                    <?else:?>
                        <a class="text-muted" href="/index.php/signup/">Регистрация</a>
                    <?endif;?>
                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-dark" href="/">
                        Large
                    </a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a class="text-muted" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
                    </a>
                    <?if ($login):?>
                        <a class="btn btn-sm btn-outline-secondary" href="/index.php/logout/">
                            Выйти
                        </a>
                    <?else:?>
                        <a class="btn btn-sm btn-outline-secondary" href="/index.php/signin/">
                            Войти
                        </a>
                    <?endif;?>
                </div>
            </div>
        </header>

        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
                <a class="p-2 text-muted" href="#">World</a>
                <a class="p-2 text-muted" href="/index.php/users/">Users</a>
                <a class="p-2 text-muted" href="/index.php/books/">Books</a>
                <a class="p-2 text-muted" href="/index.php/groups/">Groups</a>
                <a class="p-2 text-muted" href="#">Culture</a>
                <a class="p-2 text-muted" href="#">Business</a>
                <a class="p-2 text-muted" href="#">Politics</a>
                <a class="p-2 text-muted" href="#">Opinion</a>
                <a class="p-2 text-muted" href="#">Science</a>
                <a class="p-2 text-muted" href="#">Health</a>
                <a class="p-2 text-muted" href="#">Style</a>
                <a class="p-2 text-muted" href="/index.php/admin/">Admin</a>
            </nav>
        </div>
    </div>
