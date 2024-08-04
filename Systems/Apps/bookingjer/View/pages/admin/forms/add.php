<?php
Alert::show();
?>

<div class="card">
	<div class="card-header">
		<a href="<?= PORTAL ?>admin/forms" class="btn btn-sm btn-primary">
			<span class="fa fa-arrow-left"></span> Back
		</a>
		
		Create new Form		
	</div>
	
	<div class="card-body">
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#basic">Basic</a>
			</li>
			
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#availability">Availibility</a>
			</li>
			
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#payment">Payment</a>
			</li>
		</ul>
		
		<br />
		
		<div class="tab-content">
			<div class="tab-pane container active" id="basic">
			<?php
				Page::Load("pages/admin/forms/add/basic");
			?>
			</div>
			
			<div class="tab-pane container" id="availability">
			<?php
				Page::Load("pages/admin/forms/add/availability");
			?>
			</div>
			
			<div class="tab-pane container fade" id="payment">
			<?php
				Page::Load("pages/admin/forms/add/payment");
			?>
			</div>
		</div>
	</div>
</div>
