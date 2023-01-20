<?php require "includes/head.php"; ?>
<?php require "includes/navbar.php"; ?>
<div class="container">
    <h2 class="text-center py-5"><?php echo $user->first_name ?> change name</h2>
    <div class="row">
        <div class="col-md-2">
            <?php require "includes/sidebar.php" ?>
        </div>

        <div class="col-md-10 px-3">
            <form action="user/change_name.php" method="post">


                <?php if (isset($error["first_name"])): ?>
                    <span class="text-danger"><?php echo $error["first_name"] ?></span>
                <?php endif; ?>
                <input type="text" name="first_name" placeholder="First name" class="form-control mb-3"
                       value="<?php if (isset($data["first_name"])) echo $data["first_name"] ?>">

                <?php if (isset($error["last_name"])): ?>
                    <span class="text-danger"><?php echo $error["last_name"] ?></span>
                <?php endif; ?>
                <input type="text" name="last_name" placeholder="Last name" class="form-control mb-3"
                       value="<?php if (isset($data["last_name"])) echo $data["last_name"] ?>">

                <button class="form-control btn btn-primary">SAVE</button>
                <?php if (isset($error["db"])): ?>
                    <p class="alert alert-danger mt-3"><?php echo $error["db"] ?></p>
                <?php endif; ?>

            </form>
        </div>
    </div>
</div>
<?php require "includes/bottom.php"; ?>
