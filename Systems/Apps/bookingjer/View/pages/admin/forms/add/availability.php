

<div class="row">
	<div class="col-md-6 mb-3">
		Form Available:
		<select class="form-control" name="hasTimeRange">
			<option value="0">Always</option>
			<option value="1">Date Range</option>
			<option value="2">On Selected Date</option>
		</select><br />
		
		<div class="date-range-picker">
			Start:
			<input type="date" class="form-control" name="startDatetime" value="<?= date("Y-m-d") ?>" /><br />
			
			Expired:
			<input type="date" class="form-control" name="expiredDatetime" value="<?= date("Y-m-d") ?>" /><br />
		</div>
		
		<div id="available-calendar"></div>
		<input type="hidden" name="available_dates" /> 
	</div>
	
	<div class="col-md-6">
		Form Available Dete:
		<select class="form-control" name="hasUnavailable">
			<option value="0">No</option>
			<option value="1">Yes</option>
		</select><br />
		
		<div id="unavailable-calendar"></div>
		<input type="hidden" name="unavailable_dates" /> 
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