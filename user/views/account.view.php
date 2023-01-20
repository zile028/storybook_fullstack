<?php require "includes/head.php"; ?>
<?php require "includes/navbar.php"; ?>
    <div class="container">
        <h2 class="text-center py-5"><?php echo $user->first_name ?> account</h2>
        <div class="row">
            <div class="col-md-2">
                <?php require "includes/sidebar.php" ?>
            </div>

            <div class="col-md-10 px-3">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-uppercase d-flex justify-content-between align-items-center"><?php echo $user->title; ?>
                        <a class="btn btn-warning" href="user/change_title.php">CHANGE</a>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center"><?php echo $user->first_name . " " . $user->last_name; ?>
                        <a class="btn btn-warning" href="user/change_name.php">CHANGE</a></li>
                    <li class="list-group-item"><?php echo $user->email; ?></li>
                    <li class="list-group-item"><?php echo $user->role; ?></li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">Password <a
                                class="btn btn-warning" href="user/change_password.php">CHANGE</a>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">Created at:
                        <span><?php echo $user->created_at; ?></span></li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">Updated at:
                        <span><?php echo $user->updated_at; ?></span></li>

                </ul>
            </div>
        </div>
    </div>
<?php require "includes/bottom.php"; ?>