<?php require "includes/head.php" ?>
<?php require "includes/navbar.php" ?>
<div class="container">
    <h2 class="text-center py-5">Add post</h2>
    <div class="row">
        <div class="col-md-2">
            <?php require "includes/sidebar.php"; ?>
        </div>
        <div class="col-md-10 px-3">
            <form action="user/edit_post.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="old_image" value="<?php echo $post->image; ?>">
                <input type="hidden" name="id" value="<?php echo $post->id; ?>">
                <input type="text" class="form-control mb-3" name="title" placeholder="Post title"
                       value="<?php echo $post->title; ?>">

                <div class="d-flex gap-3">
                    <?php if ($post->image): ?>
                        <div class="col-md-4 ">
                            <img class="img-fluid" src="<?php echo UPLOAD_DIR . $post->image ?>" alt="">
                        </div>
                    <?php endif; ?>
                    <div class="col">
                        <textarea class="form-control mb-3" name="text" cols="30" rows="10"
                                  placeholder="Post text"><?php echo $post->text; ?></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="post-file">Choose image:</label>
                        <input id="post-file" type="file" class="form-control" name="image">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="category">Choose category:</label>
                        <select id="category" name="category_id" class="form-control">
                            <?php foreach ($categories as $category): ?>
                                <option <?php echo $category->id === $post->category_id ? "selected" : null ?>
                                        value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="visibility">Choose visibility:</label>
                        <select id="visibility" name="visibility_id" class="form-control">
                            <?php foreach ($visibilities as $visibility): ?>
                                <option <?php echo $visibility->id === $post->visibility_id ? "selected" : null ?>
                                        value="<?php echo $visibility->id ?>"><?php echo $visibility->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="d-flex gap-4">
                    <button class="form-control btn btn-primary" name="remove_image">Remove image</button>
                    <button class="form-control btn btn-primary" name="save">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require "includes/bottom.php" ?>
