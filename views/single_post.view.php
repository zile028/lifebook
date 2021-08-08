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
        <div class="col-8 offset-1">

            <div class="card mb-3">

                <div class="card-header">
                    <img class="card-img" src="./uploads/<?php echo $post['image']; ?>" alt="">
                </div>

                <div class="card-body">
                    <h5 class="card-title text-uppercase">
                        <?php echo $post['title']; ?>
                    </h5>
                    <p class="card-text">
                        <?php echo $post['body']; ?>
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


</div>


<?php require "views/includes/bottom.php" ?>