<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Filip">
    <meta name="theme-color" content="#f8f9fa">
    <title>RockZone</title>

    <link rel="shortcut icon" href="favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon/favicon.ico" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/style.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-md navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand phone-brand" href="/home">
                    <img src="img/logo.png" alt="RockZone">
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/about">Kto sme</a>
                        </li>
                        <li>
                            <a class="navbar-brand" href="/home">
                                <img src="img/logo.png" alt="RockZone">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/contact">Kontakt</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/blog">Blog</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <?php

//        if (!isset($_COOKIE['firsttime'])) {
//            setcookie("firsttime", "no");
//            $content = $_GET['content_id'];
//        }

//        $content = $_GET['content_id'] ?? "";
        $uri = $_SERVER['REQUEST_URI'];

        switch ($uri) {
            case str_contains($uri, "/home"):
                include("home.php");
                break;
            case str_contains($uri, "/about"):
                include("about.php");
                break;
            case str_contains($uri, "/contact"):
                include("contact.php");
                break;
            case str_contains($uri, "/blog"):
                include("blog.php");
                break;
            case str_contains($uri, "/edit-blog"):
                include("editblog.php");
                break;
            default:
                include("home.php");
        }

    ?>

    <footer class="fixed-bottom">
        <div id="copyright" class="container">
            <div class="row">
                <div class="col-3"><p>RockZone</p></div>
                <div class="col-9"><p>2021&nbsp;&copy;&nbsp;Filip Kivader</p></div>
            </div>
        </div>
    </footer>

</body>
</html>