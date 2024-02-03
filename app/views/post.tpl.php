<?php require "components/header.php" ?>

<main class="main py-3">
    <div class="container">
        <div class="row">


            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="post-title"><?= $post['title'] ?></h3>
                        <h4><?= $post['excerpt']?></h4>
                        <p><?= $post['content']?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <?php require "components/sidebar.php" ?>
            </div>
        </div>
    </div>
</main>

<?php require "components/footer.php" ?>
