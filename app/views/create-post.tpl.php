<?php require VIEW_COMPONENTS . "/header.php" ?>

<main class="main py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Create new post</h2>
                <form action="" method="post">
                    <div class="mb-3 has-validation">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="title"
                               placeholder="new title">
                        <?php if (empty($errors['title'])): ?>
                            <div class="valid-feedback d-block">
                                Looks good!
                            </div>
                        <?php endif; ?>
                        <?php if (isset($errors['title'])): ?>
                            <div class="invalid-feedback d-block">
                                <?= $errors['title'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Excerpt</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="excerpt"
                               placeholder="new excerpt">

                        <?php if (empty($errors['excerpt'])): ?>
                            <div class="valid-feedback d-block">
                                Looks good!
                            </div>
                        <?php endif; ?>
                        <?php if (isset($errors['excerpt'])): ?>
                            <div class="invalid-feedback d-block">
                                <?= $errors['excerpt'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">New post</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3"
                                  placeholder="Enter content"></textarea>

                        <?php if (empty($errors['content'])): ?>
                            <div class="valid-feedback d-block">
                                Looks good!
                            </div>
                        <?php endif; ?>
                        <?php if (isset($errors['content'])): ?>
                            <div class="invalid-feedback d-block">
                                <?= $errors['content'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Create post">
                </form>

            </div>
        </div>
    </div>
</main>

<?php require VIEW_COMPONENTS . "/footer.php" ?>
