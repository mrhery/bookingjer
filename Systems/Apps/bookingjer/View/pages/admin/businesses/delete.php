
<?php
Alert::show();
?>

<div class="card">
	<div class="card-header">
		<a href="<?= PORTAL ?>admin/businesses" class="btn btn-sm btn-primary">
			<span class="fa fa-arrow-left"></span>  Back
		</a>
		
		Delete Business
	</div>
	
	<div class="card-body">
		<form action="<?= Controller::url("Admin/BusinessController::remove"); ?>" method="POST">
			<div class="row">
				<div class="col-md-12">
					<h3>Are sure to remove?</h3>
				</div>
				
				<div class="col-md-6">
					Name:
					<input disabled type="text" value="<?= $b->name ?>" class="form-control" placeholder="Name" name="name" /><br />
					
					Phone:
					<input disabled type="tel" value="<?= $b->phone ?>" class="form-control" placeholder="Phone" name="phone" /><br />
					
					Email:
					<input disabled type="email" value="<?= $b->email ?>" class="form-control" placeholder="Email" name="email" /><br />
				</div>
				
				<div class="col-md-6">
					
					
					Password (only new password):
					<textarea disabled class="form-control" placeholder="Address" name="address"><?= $b->address ?></textarea><br />
				</div>
				
				<div class="col-12 text-center">
					<button class="btn btn-danger btn-sm">
						<span class="fa fa-trash"></span> Confirm Delete
					</button>
				</div>
			</div>
			
			<?= Controller::form(["business_id" => $b->id]); ?>
		</form>
	</div>
</div>