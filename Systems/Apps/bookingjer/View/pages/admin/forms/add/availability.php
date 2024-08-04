

<div class="row">
	<div class="col-6">
		Has Time Range?
		<select class="form-control" name="hasTimeRange">
			<option value="0">No</option>
			<option value="1">Yes</option>
		</select><br />
		
		<div class="date-range-picker">
			Start:
			<input type="date" class="form-control" name="startDatetime" value="<?= date("Y-m-d") ?>" /><br />
			
			Expired:
			<input type="date" class="form-control" name="expiredDatetime" value="<?= date("Y-m-d") ?>" /><br />
		</div>
	</div>
</div>