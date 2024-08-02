
<?php
Alert::show();
?>

<div class="card">
	<div class="card-header">
		<a href="<?= PORTAL ?>admin/users" class="btn btn-sm btn-primary">
			<span class="fa fa-arrow-left"></span>  Back
		</a>
		
		Create new User
	</div>
	
	<div class="card-body">
		<form action="<?= Controller::url("Admin/UsersController::create"); ?>" method="POST">
			<div class="row">
				<div class="col-md-6">
					Name:
					<input type="text" class="form-control" placeholder="Name" name="name" /><br />
					
					Phone:
					<input type="tel" class="form-control" placeholder="Phone" name="phone" /><br />
				</div>
				
				<div class="col-md-6">
					Email:
					<input type="email" class="form-control" placeholder="Email" name="email" /><br />
					
					Password:
					<input type="password" class="form-control" placeholder="Password" name="password" /><br />
				</div>
				
				<div class="col-12 text-center">
					<button class="btn btn-success btn-sm">
						<span class="fa fa-save"></span> Save
					</button>
				</div>
			</div>
			
			<?= Controller::form(); ?>
		</form>
	</div>
</div>