<ul class="list-group">
    <li class="list-group-item  active"
        aria-current="true"><a class="text-light" href="post?id=<?= $recent_posts[1]['id'] ?>"><?= $recent_posts[1]['slug'] ?></a></li>
    <?php foreach ($recent_posts as $key => $title): ?>
        <?php if ($key !== 1): ?>
            <li class="list-group-item"><a href="post?id=<?php echo $title['id'] ?>"><?php echo $title['slug'] ?></a>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>