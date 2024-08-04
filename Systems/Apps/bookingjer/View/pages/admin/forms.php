<?php
Alert::show();
?>

<div class="card">
	<div class="card-header">
		<span class="fa fa-list"></span> All Forms
		
		<a href="<?= PORTAL ?>admin/forms/add" class="btn btn-sm btn-primary">
			<span class="fa fa-plus"></span> Create new Form
		</a>
	</div>
	
	<div class="card-body">
		<table class="table table-hover table-fluid table-bordered dataTable">
			<thead>
				<tr>
					<th class="text-center" width="25px">No</th>
					<th>Details</th>
					<th class="text-center" width="150px">Status</th>
					<th class="text-center" width="150px">Date</th>
					<th class="text-center" width="50px">Qty.</th>
					<th class="text-right" width="150px">:::</th>
				</tr>
			</thead>
			
			<tbody>
			<?php
				$no = 1;
				foreach(forms::list() as $f){
				?>
				<tr>
					<td class="text-center"><?= $no++ ?></td>
					<td>
						<b><u><?= $f->title ?></u></b><br />
						<?= $f->description ?>
						<hr />
						Required Approval? <b><?= $f->requireApproval == 1 ? "Yes" : "No" ?></b>
						<hr />
						<?php
							if($f->enablePayment == 0){
								echo "Payment Disabled";
							}else{
								echo "RM " . number_format($f->paymentAmount, 2) . "<br />";
								echo "<small>*". (FormHelper::getPaymentType($f->paymentType)) ."</small><br />";
								
								if($f->requireApproval == 1){
									if($f->paymentAfterApprove == 1){
										echo "<small>*payment after approve</small><br />";
									}else{
										echo "<small>*payment before approve</small><br />";
									}
								}
							}
						?>
					</td>
					<td class="text-center"><?= FormHelper::getStatus($f->status) ?? "Unknown" ?></td>
					<td class="text-center">
					<?php
						if($f->hasTimeRange == 1){
						?>
							Start: <?= $f->startDatetime ?><br />
							Expired: <?= $f->expiredDatetime ?><br />
						<?php						
						}else{
							echo "No expired";
						}
					?>
					</td>
					<td class="text-center"><?= $f->quantity ?></td>
					<td class="text-right">
						<a href="<?= PORTAL ?>admin/forms/edit/<?= $f->id ?>" class="btn btn-sm btn-warning">
							<span class="fa fa-edit"></span> Edit
						</a>
						
						<a href="<?= PORTAL ?>admin/forms/delete/<?= $f->id ?>" class="btn btn-sm btn-danger">
							<span class="fa fa-trash"></span>
						</a>
					</td>
				</tr>
				<?php
				}
			?>
			</tbody>
		</table>
	</div>
</div>
