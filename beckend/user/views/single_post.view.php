<?php require "includes/head.php" ?>
<?php require "includes/navbar.php" ?>
    <div class="container">
        <h2 class="text-center py-5"><?php echo $post->title; ?></h2>
        <div class="row">
            <div class="col-md-2">
                <?php require "includes/sidebar.php"; ?>
            </div>
            <div class="col-md-10 px-3">
                <div class="card">
                    <?php if ($post->image): ?>
                        <img class="card-img-top img-thumbnail" src="<?php echo "public/" . $post->image; ?>" alt="">
                    <?php endif; ?>
                    <div class="card-header">
                        <span>Published: <?php echo $post->created_at; ?></span>
                    </div>
                    <div class="card-body">
                        <p><?php echo $post->text ?></p>
                    </div>
                    <div class="card-footer text-end">
                        <span class="btn btn-sm btn-info"><?php echo $post->first_name . " " . $post->last_name; ?></span>
                        <a class="btn btn-sm btn-warning" href="user/edit_post.php?id=<?php echo $post->id; ?>">Edit
                            post</a>
                        <a class="btn btn-sm btn-danger" href="user/delete_post.php?id=<?php echo $post->id; ?>">Delete
                            post</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require "includes/bottom.php" ?>