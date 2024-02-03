<?php require "components/header.php" ?>

    <main class="main py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php foreach ($posts as $key => $post): ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <a href="post?id=<?= $post['id'] ?>" class="card-title"><?php echo $post['title'] ?></a>
                                <p class="card-text"><?php echo $post['excerpt'] ?></p>
                                <a href="post?id=<?= $post['id'] ?>"><?php echo $post['slug'] ?></a>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
                <div class="col-md-4">
                    <?php require "components/sidebar.php" ?>
                </div>
            </div>
        </div>
    </main>

<?php require "components/footer.php" ?>