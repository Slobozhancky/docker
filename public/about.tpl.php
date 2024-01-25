<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <title>Document</title>
</head>
<body>

<div class="wrapper">
    <header class="header">
        <nav class="navbar navbar-expand-lg" style="background-color: #18171B;">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>

    <main class="main py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                   <?php echo $post['post']?>
                </div>
                <div class="col-md-4">
                    <ul class="list-group">
                        <li class="list-group-item active"
                            aria-current="true"><?php echo $recent_posts[1]['slug'] ?></li>
                        <?php foreach ($recent_posts as $key => $title): ?>
                            <?php if ($key !== 1): ?>
                                <li class="list-group-item"><?php echo $title['slug'] ?></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        Footer <?php echo date("Y-m-d") ?>
    </footer>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    </body>
    </html>