<?php require "includes/head.php"; ?>
<?php require "includes/navbar.php"; ?>
<div class="container">
    <h2 class="text-center py-5"><?php echo $user->first_name ?> change name</h2>
    <div class="row">
        <div class="col-md-2">
            <?php require "includes/sidebar.php" ?>
        </div>

        <div class="col-md-10 px-3">
            <form action="user/change_password.php" method="post">

                <input type="password" name="old_password" placeholder="Old password" class="form-control mb-3">

                <input type="password" name="password" placeholder="Password" class="form-control mb-3">

                <input type="password" name="password_repeat" placeholder="Password repeat"
                       class="form-control mb-3">

                <button class="form-control btn btn-primary">SAVE</button>

                <?php if (isset($error["msg"])): ?>
                    <p class="alert alert-danger mt-3"><?php echo $error["msg"] ?></p>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>
<?php require "includes/bottom.php"; ?>
