<ul class="list-group">
    <li class="list-group-item active"
        aria-current="true"><?php echo $recent_posts[1]['slug'] ?></li>
    <?php foreach ($recent_posts as $key => $title): ?>
        <?php if ($key !== 1): ?>
            <li class="list-group-item"><a href="<?php echo $title['slug'] ?>"><?php echo $title['slug'] ?></a></li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>