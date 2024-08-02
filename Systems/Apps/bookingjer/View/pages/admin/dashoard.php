
<?php
Alert::show();
?>

<div class="card">
	<div class="card-header">
		<span class="fa fa-dashboard"></span> Dashboard
	</div>
	
	<div class="card-body">
		<div class="row mb-4">
			<div class="col-md-3">
				<div class="card border-primary">
					<div class="card-header bg-primary text-center text-light">
						Total Users
					</div>
					
					<div class="card-body text-center p-2">
						<h3 class="text-dark">100</h3>
					</div>
					
					<div class="card-footer text-center">
						<a href="<?= PORTAL ?>admin/users" class="btn btn-sm btn-block btn-primary">
							View all
						</a>
					</div>
				</div>
			</div>
			
			<div class="col-md-3">
				<div class="card border-success">
					<div class="card-header bg-success text-center text-light">
						Total Forms
					</div>
					
					<div class="card-body text-center p-2">
						<h3 class="text-dark">100</h3>
					</div>
					
					<div class="card-footer text-center">
						<a href="<?= PORTAL ?>admin/users" class="btn btn-sm btn-block btn-success">
							View all
						</a>
					</div>
				</div>
			</div>
			
			<div class="col-md-3">
				<div class="card border-danger">
					<div class="card-header bg-danger text-center text-light">
						Collections
					</div>
					
					<div class="card-body text-center p-2">
						<h3 class="text-dark">RM 3,000.00</h3>
					</div>
					
					<div class="card-footer text-center">
						<a href="<?= PORTAL ?>admin/users" class="btn btn-sm btn-block btn-danger">
							View all
						</a>
					</div>
				</div>
			</div>
			
			<div class="col-md-3">
				<div class="card border-info">
					<div class="card-header bg-info text-center text-light">
						Web Statistic
					</div>
					
					<div class="card-body text-center p-2">
						<h3 class="text-dark">100k</h3>
					</div>
					
					<div class="card-footer text-center">
						<a href="<?= PORTAL ?>admin/users" class="btn btn-sm btn-block btn-info">
							View all
						</a>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row mb-4">
			<div class="col-md-3">
				<div id="donutchart" style="width: 100%; height: 300px;"></div>
			</div>
			
			<div class="col-md-9">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15953.478811635407!2d103.62469589999999!3d1.5440134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da741b0bf8bb1d%3A0x64974db2f8fed209!2sU%20Mall!5e0!3m2!1sen!2smy!4v1722620614201!5m2!1sen!2smy" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</div>
	
		<div class="row">
			<div class="col-12">
				<h3>Top 10 Business Statistic</h3>
				
				<table class="table table-fluid table-hover table-bordered dataTable">
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th>Name</th>
							<th class="text-center">Country</th>
							<th class="text-center">Users</th>
							<th class="text-center">Forms</th>
							<th class="text-right">Collections (RM)</th>
						</tr>
					</thead>
					
					<tbody>
					<?php
						for($i = 1; $i <= 10; $i++){
						?>
						<tr>
							<td class="text-center"><?= $i ?></td>
							<td>Business <?= $i ?></td>
							<td class="text-center">10</td>
							<td class="text-center">10</td>
							<td class="text-center">10</td>
							<td class="text-right"><?= number_format(25000, 2) ?></td>
						</tr>
						<?php
						}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script>
google.charts.load("current", {packages:["corechart", "bar"]});

google.charts.setOnLoadCallback(drawCharts);

function drawCharts() {
	drawDonutChart();
	// drawBasic();
	// drawBarChart();
}

function drawDonutChart() {
	var jsArrPie =  [
		['Task', 'Percentage'],
		['Paid', 10],
		['Partial', 15],
		['Unpaid', 9]
	];
	
	var data = google.visualization.arrayToDataTable(jsArrPie);

	var options = {
		title: 'Geo User',
		titleTextStyle: {
			fontSize: 24,
			bold: true 
		},
		titlePosition: 'center', 
		pieHole: 0.4,
		legend: { position: 'bottom' },
		colors: ['#78cf67', '#4d7be8', '#d44242'],
		pieSliceText: 'percentage', 
		tooltip: {
			text: 'percentage'
		}
	};

	var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
	chart.draw(data, options);
}
</script>