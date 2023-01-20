<?php require "includes/head.php" ?>
<?php require "includes/navbar.php" ?>
<div class="container">
    <h1 class="text-center py-5">All posts</h1>
    <div class="row">
        <div class="col-md-2">
            <ul class="list-group">
                <li class="list-group-item"><a href="index.php">All post</a></li>
                <?php foreach ($categories as $category): ?>
                    <li class="list-group-item">
                        <a href="index.php?category=<?php echo $category->id; ?>"><?php echo $category->name ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-md-10">
            <?php if (count($all_posts) > 0): ?>
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

                            <a class="btn btn-sm btn-info"
                               href="index.php?user=<?php echo $post->user_id; ?>"><?php echo $post->first_name . " " . $post->last_name; ?></a>

                            <a href="user/single_post.php?id=<?php echo $post->id; ?>"
                               class="btn btn-sm btn-success">Read
                                more</a>
                            <a class="btn btn-sm btn-warning"
                               href="voting.php?id=<?php echo $post->id; ?>">Voting <span
                                        class="badge bg-danger rounded-pill"><?php echo $post->voting_count; ?></span></a>
                            <a class="btn btn-sm btn-danger" href="add_comment.php?id=<?php echo $post->id; ?>">Add
                                comment</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Dont have post!</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php require "includes/bottom.php" ?>

