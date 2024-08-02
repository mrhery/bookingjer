
<?php
Alert::show();

?>

<div class="card">
	<div class="card-header">
		<span class="fa fa-building"></span> Users
		
		<a href="<?= PORTAL ?>admin/businesses/add" class="btn btn-sm btn-primary">
			<span class="fa fa-plus"></span> Create new Business
		</a>
	</div>
	
	<div class="card-body">
		<table class="table table-hover table-fluid table-bordered dataTable">
			<thead>
				<tr>
					<th class="text-center">No</th>
					<th>Name</th>
					<th class="text-center">Email</th>
					<th class="text-center">Phone</th>
					<th class="text-right">:::</th>
				</tr>
			</thead>
			
			<tbody>
			<?php
				$no = 1;
				foreach(businesses::list() as $b){
				?>
				<tr>
					<td class="text-center"><?= $no++ ?></td>
					<td><?= $b->name ?></td>
					<td class="text-center"><?= $b->phone ?></td>
					<td class="text-center"><?= $b->email ?></td>
					<td class="text-right">
						<a href="<?= PORTAL ?>admin/businesses/edit/<?= $b->id ?>" class="btn btn-sm btn-warning">
							<span class="fa fa-edit"></span> Edit
						</a>
						
						<a href="<?= PORTAL ?>admin/businesses/delete/<?= $b->id ?>" class="btn btn-danger btn-sm">
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