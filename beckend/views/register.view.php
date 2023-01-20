<?php require "includes/head.php" ?>
<?php require "includes/navbar.php" ?>

<div class="container">
    <h1 class="display-4 text-center m-3 p-3">Register</h1>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="register.php" method="POST">
                <select name="title" class="form-control mb-3">
                    <option value="mr" <?php if ($data["title"] === "mr") echo "selected"; ?>>Mr</option>
                    <option value="ms" <?php if ($data["title"] === "ms") echo "selected"; ?>>Ms</option>
                </select>

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

                <?php if (isset($error["email"])): ?>
                    <span class="text-danger"><?php echo $error["email"] ?></span>
                <?php endif; ?>
                <input type="email" name="email" placeholder="Email" class="form-control mb-3"
                       value="<?php if (isset($data["email"])) echo $data["email"]; ?>">

                <?php if (isset($error["password"])): ?>
                    <span class="text-danger"><?php echo $error["password"] ?></span>
                <?php endif; ?>
                <input type="password" name="password" placeholder="Password" class="form-control mb-3">

                <?php if (isset($error["password_repeat"])): ?>
                    <span class="text-danger"><?php echo $error["password_repeat"] ?></span>
                <?php endif; ?>
                <input type="password" name="password_repeat" placeholder="Password repeat"
                       class="form-control mb-3">

                <button class="btn btn-primary form-control">Register</button>
            </form>
        </div>
    </div>
</div>


<?php require "includes/bottom.php" ?>
