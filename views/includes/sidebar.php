<ul class="list-unstyled">
    <li class="list-group-item bg-primary fw-bold"><a class="text-decoration-none text-white" href="index.php">ALL
            POST</a></li>

    <li class="list-group-item bg-success fw-bold text-white">CATEGORIES</li>
    <?php foreach($categories as $cat): ?>
    <li class="list-group-item bg-success fw-bold"><a class="text-decoration-none text-white"
            href="index.php?category=<?php echo $cat['id']; ?>">
            <?php echo $cat['name']; ?>
        </a></li>
    <?php endforeach; ?>

    <li class="list-group-item bg-warning fw-bold text-white">USERS</li>
    <?php foreach($users as $user): ?>
    <li class="list-group-item bg-warning fw-bold"><a class="text-decoration-none text-white"
            href="index.php?user=<?php echo $user['id']; ?>">
            <?php echo "{$user['first_name']} {$user['last_name']}"; ?>
        </a>
    </li>
    <?php endforeach; ?>
</ul>