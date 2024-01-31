<?php require VIEW_COMPONENTS . "/header.php" ?>


<main class="main py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php echo $post['post'] ?>
                </div>
                <div class="col-md-4">
                    <?php require "components/sidebar.php" ?>

                </div>
            </div>
        </div>
    </main>

<?php require VIEW_COMPONENTS . "/footer.php" ?>
