<?php require "./views/includes/head.php"; ?>
<?php require "./views/includes/navbar.php"; ?>

<div class="container">
    <div class="row">
        <h2 class="display-4 text-center">All posts</h2>

        <div class="col-4">
            <?php include "./views/includes/sidebar.php" ?>
        </div>
        <div class="col-8">
            <div class="row">
                <?php foreach($posts as $post): ?>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <p><?php echo ($post['public']) ? '<i class="far fa-eye"></i>':'<i class="far fa-eye-slash"></i>' ?>
                            </p>
                            <p><?php echo $post['title'] ?></p>
                        </div>
                        <div class="card-body">
                            <img src="<?php echo IMGROOT . $post['image'] ?>" class="img-fluid">
                        </div>
                        <div class="card-footer">
                            <a href="edit_post.php?id=<?php echo $post['id'] ?>"
                                class="btn btn-sm btn-warning float-start"><i class="far fa-edit"></i></a>
                            <a href="delete_post.php?id=<?php echo $post['id'] ?>"
                                class="btn btn-sm btn-danger float-end"><i class="far fa-trash-alt"></i></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>


<?php require "./views/includes/bottom.php"; ?>