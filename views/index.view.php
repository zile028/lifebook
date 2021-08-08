<?php require "views/includes/head.php" ?>
<?php require "views/includes/navbar.php" ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

<div class="container">
    <h1 class="display-4 text-center m-3 p-3">Lifebook posts</h1>
    <div class="row">
        <div class="col-3">
            <?php require "views/includes/sidebar.php"; ?>
        </div>
        <div class="col-9">
            <?php foreach($posts as $post): ?>
            <div class="card mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <img class="card-img" src="./uploads/<?php echo $post['image']; ?>" alt="">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase">
                                <?php echo $post['title']; ?><span class="ms-1 badge bg-secondary">
                                    <?php echo $post['category_name']; ?>
                                </span>
                            </h5>
                            <p class="card-text">
                                <?php echo excerpt($post['body'],20) ; ?><a class="badge bg-primary ms-1"
                                    href="single_post.php?postid=<?php echo $post['post_id']; ?>">Read
                                    more</a>
                            </p>
                            <div>
                                <p class="card-text float-start"><span class="text-muted">Posted
                                        <?php echo "{$post['first_name']} {$post['last_name']}"; ?>
                                    </span></p>
                                <p class="card-text float-end"><span class="text-muted">Created at:
                                        <?php echo $post['created_at']; ?>
                                    </span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>


</div>


<?php require "views/includes/bottom.php" ?>