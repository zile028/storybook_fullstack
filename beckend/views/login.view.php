<?php require "includes/head.php"; ?>
<?php require "includes/navbar.php"; ?>
	
	<div class="container">
		<h1 class="display-4 text-center m-3 p-3">Login</h1>
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<form action="login.php" method="POST">
					<?php if (isset($error["email"])): ?>
						<span class="text-danger"><?php echo $error["email"] ?></span>
					<?php endif; ?>
					<input type="email" name="email" placeholder="Email" class="form-control mb-3"
						   value="<?php if (isset($data["email"])) echo $data["email"]; ?>">
					
					<?php if (isset($error["password"])): ?>
						<span class="text-danger"><?php echo $error["password"] ?></span>
					<?php endif; ?>
					<input type="password" name="password" placeholder="Password" class="form-control mb-3">

					<button class="btn btn-primary form-control">Login</button>
				</form>
			</div>
		</div>
	</div>

<?php require "includes/bottom.php"; ?>