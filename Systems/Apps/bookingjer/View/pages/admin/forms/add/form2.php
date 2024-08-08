<div id='builder'></div>
<script src="<?= PORTAL ?>assets/vendor/formio.js/formio.full.min.js"></script>

<script>
var builder = new Formio.FormBuilder(document.getElementById("builder"), null, {});

var onBuild = function() {
	var formjson = JSON.stringify(builder.instance.schema, null, 4);
	
	console.log(formjson);
};

var onReady = function() {
  builder.instance.on('saveComponent', onBuild);
  builder.instance.on('editComponent', onBuild);
};

var setDisplay = function(display) {
  builder.setDisplay(display).then(onReady);
};

builder.instance.ready.then(onReady);
</script>