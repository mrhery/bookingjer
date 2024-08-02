
<?php
Alert::show();
?>

<div class="card">
	<div class="card-header">
		<a href="<?= PORTAL ?>admin/businesses" class="btn btn-sm btn-primary">
			<span class="fa fa-arrow-left"></span>  Back
		</a>
		
		Edit User
	</div>
	
	<div class="card-body">
		<form action="<?= Controller::url("Admin/BusinessController::update"); ?>" method="POST">
			<div class="row">
				<div class="col-md-6">
					Name:
					<input type="text" value="<?= $b->name ?>" class="form-control" placeholder="Name" name="name" /><br />
					
					Phone:
					<input type="tel" value="<?= $b->phone ?>" class="form-control" placeholder="Phone" name="phone" /><br />
					
					Email:
					<input type="email" value="<?= $b->email ?>" class="form-control" placeholder="Email" name="email" /><br />
				</div>
				
				<div class="col-md-6">
					
					
					Address:
					<textarea class="form-control" placeholder="Address" name="address"><?= $b->address ?></textarea><br />
				</div>
				
				<div class="col-12 text-center">
					<button class="btn btn-success btn-sm">
						<span class="fa fa-save"></span> Save
					</button>
				</div>
			</div>
			
			<?= Controller::form(["business_id" => $b->id]); ?>
		</form>
	</div>
</div>