<div class="row">
	<div class="col-12">
		Title:
		<input type="text" class="form-control" name="title" placeholder="Form Title" /><br />
		
		Description:
		<textarea class="form-control" name="descrtipion" placeholder="Description"></textarea>
		
		<div class="text-right mt-3">
			<button class="btn btn-dark btn-sm to-availibility">
				Next <span class="fa fa-arrow-right"></span>
			</button>
		</div>
	</div>
</div>

<script>
$(".date-range-picker").hide();

$("[name=hasTimeRange]").on("change", function(){
	if($(this).val() == "1"){
		$(".date-range-picker").show();
	}else{
		$(".date-range-picker").hide();
	}
});
</script>