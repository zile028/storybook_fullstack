<?php require "includes/head.php" ?>
<?php require "includes/navbar.php" ?>
<div class="container">
    <h2 class="text-center py-5">All post</h2>
    <div class="row">
        <div class="col-md-2">
            <?php require "includes/sidebar.php"; ?>
        </div>
        <div class="col-md-10 px-3">
            <?php foreach ($all_posts as $post): ?>
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5><?php echo $post->title; ?></h5>
                        <span>Published: <?php echo $post->created_at; ?></span>
                    </div>
                    <div class="card-body">
                        <div class="d-flex gap-4">
                            <?php if ($post->image): ?>
                                <div class="col-md-3">
                                    <img class="img-fluid" src="<?php echo "public/" . $post->image; ?>" alt="">
                                </div>
                            <?php endif; ?>
                            <div class="col">
                                <p><?php echo substr($post->text, 0, 200) ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <span class="btn btn-sm btn-info"><?php echo $post->first_name . " " . $post->last_name; ?></span>
                        <a href="user/single_post.php?id=<?php echo $post->id; ?>"
                           class="btn btn-sm btn-success">Read
                            more</a>
                        <a class="btn btn-sm btn-warning" href="user/edit_post.php?id=<?php echo $post->id; ?>">Edit
                            post</a>
                        <a class="btn btn-sm btn-danger" href="user/delete_post.php?id=<?php echo $post->id; ?>">Delete
                            post</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php require "includes/bottom.php" ?>

