

<div class="container mt-5">
	<div class="row">
		<div class="col-md-3">
			<div class="card">
				<div class="card-header">
					<span class="fa fa-rocket"></span> Login: <?= APP_NAME ?>
				</div>
				
				<div class="card-body">
				<?php
					Alert::show();
				?>
					<form action="<?= Controller::url("Admin/LoginController::login") ?>" method="POST">
						Username / Email:
						<input type="text" placeholder="Username / Email" class="form-control" name="username" /><br />
						
						Password:
						<input type="password" placeholder="Password" class="form-control" name="password" /><br />
						
						<button class="btn btn-success btn-sm">
							<span class="fa fa-rocket"></span> Login
						</button>
					
					<?= Controller::form();	?>
					</form>
				</div>
			</div>
		</div>
		
		<div class="col-md-9">
			<!-- Marketing sliding banenr -->
			
			<div id="demo" class="carousel slide" data-ride="carousel">
				<ul class="carousel-indicators">
					<li data-target="#demo" data-slide-to="0" class="active"></li>
					<li data-target="#demo" data-slide-to="1"></li>
					<li data-target="#demo" data-slide-to="2"></li>
				</ul>

			<!-- The slideshow -->
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="<?= PORTAL ?>assets/images/b1.png" class="img img-fluid" />
				</div>
				
				<div class="carousel-item">
					<img src="<?= PORTAL ?>assets/images/b1.png" class="img img-fluid" />
				</div>
			</div>
			
			<a class="carousel-control-prev" href="#demo" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			</a>
			<a class="carousel-control-next" href="#demo" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			</a>

			</div>
		</diV>
	</div>
</div>