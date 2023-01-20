<?php require "includes/head.php" ?>
<?php require "includes/navbar.php" ?>
<div class="container">
    <h2 class="text-center py-5">Add post</h2>
    <div class="row">
        <div class="col-md-2">
            <?php require "includes/sidebar.php"; ?>
        </div>
        <div class="col-md-10 px-3">
            <form action="user/add_post.php" method="post" enctype="multipart/form-data">
                <input type="text" class="form-control mb-3" name="title" placeholder="Post title">

                <textarea class="form-control mb-3" name="text" cols="30" rows="10" placeholder="Post text"></textarea>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="post-file">Choose image:</label>
                        <input id="post-file" type="file" class="form-control" name="image" placeholder="Post image">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="category">Choose category:</label>
                        <select id="category" name="category_id" class="form-control">
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="visibility">Choose visibility:</label>
                        <select id="visibility" name="visibility_id" class="form-control">
                            <?php foreach ($visibilities as $visibility): ?>
                                <option value="<?php echo $visibility->id ?>"><?php echo $visibility->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <button class="form-control btn btn-primary">Add post</button>
            </form>
        </div>
    </div>
</div>
<?php require "includes/bottom.php" ?>
