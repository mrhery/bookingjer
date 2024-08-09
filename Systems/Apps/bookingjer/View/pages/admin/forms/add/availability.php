
<div class="row mb-5">
	<div class="col-md-6 mb-2">
		<label for="formPublic" class="form-control mb-3">
			<input type="checkbox" id="formPublic" name="formPublic" /> Allow public listing 
			
			<span class="fa fa-info" data-toggle="tooltip" title="Allow your form to be listed in our public form listing."></span>
		</label>
		
		<label for="enableBackDated" class="form-control mb-3">
			<input type="checkbox" id="enableBackDated" name="enableBackDated" /> Enable Back Dated
			
			<span class="fa fa-info" data-toggle="tooltip" title="Allow user to choose date before current date."></span>
		</label>
		
		<label for="multipleDate" class="form-control">
			<input type="checkbox" id="multipleDate" name="multipleDate" /> Enable Multiple Date Selection
			
			<span class="fa fa-info" data-toggle="tooltip" title="Allow user to select multiple date on the calendar."></span>
		</label>
	</div>
	
	<div class="col-md-6">
		Day(s) before book (0 - can book today):
		<input type="number" class="form-control" id="dayBefore" min="0" placeholder="Today" /> <br />
		
		Quantity (0 for unlimited):
		<input type="number" class="form-control" id="quantity" min="0" placeholder="Unlimited" />
	</div>
</div>

<div class="row">
	<div class="col-md-6 mb-3">
		<h4>Form Available Date</h4>
		<hr />
		
		<select class="form-control" name="hasTimeRange" id="hasTimeRange">
			<option value="0">Always</option>
			<option value="1">Date Range</option>
			<option value="2">Select Date</option>
		</select><br />
		
		<div class="date-range-picker">
			Start:
			<input type="date" class="form-control" id="startDatetime" name="startDatetime" value="<?= date("Y-m-d") ?>" /><br />
			
			Expired:
			<input type="date" class="form-control" id="expiredDatetime" name="expiredDatetime" value="<?= date("Y-m-d") ?>" /><br />
		</div>
		
		<div id="available-calendar"></div>
		<input type="hidden" id="available_dates" name="available_dates" /> 
	</div>
	
	<div class="col-md-6">
		<h4>Form Unavailable Date</h4>
		<hr />
		
		<select class="form-control" id="hasUnavailable" name="hasUnavailable">
			<option value="0">None</option>
			<option value="1">Select Date</option>
		</select><br />
		
		<div id="unavailable-calendar"></div>
		<input type="hidden" id="unavailable_dates" name="unavailable_dates" /> 
	</div>
</div>

<div class="mt-3">
	<button type="button" class="btn btn-dark to-basic float-left">
		<span class="fa fa-arrow-left"></span> Back to Basic 
	</button>

	<button type="button" class="btn btn-dark to-payment float-right">
		Next to Payment <span class="fa fa-arrow-right"></span>
	</button>
</div>

<script>
$(".date-range-picker").hide();
$("#available-calendar").hide();
$("#unavailable-calendar").hide();

$("[name=hasTimeRange]").on("change", function(){    
	switch($(this).val()){
		case "1":
			$("#available-calendar").hide();
			$(".date-range-picker").show();
		break;
		
		case "2":
			$("#available-calendar").show();
			$(".date-range-picker").hide();
		break;
		
		default:
			$("#available-calendar").hide();
			$(".date-range-picker").hide();
		break;
	}
});

$("[name=hasUnavailable]").on("change", function(){    
	switch($(this).val()){
		case "1":
			$("#unavailable-calendar").show();
		break;
		
		default:
			$("#unavailable-calendar").hide();
		break;
	}
});

prepareCalendar("#available-calendar", {
	onSelectDate: function(date, selected_dates){
		$("[name=available_dates]").val(selected_dates.join(","));
	}
});

prepareCalendar("#unavailable-calendar", {
	onSelectDate: function(date, selected_dates){
		$("[name=unavailable_dates]").val(selected_dates.join(","));
	}
});



</script>