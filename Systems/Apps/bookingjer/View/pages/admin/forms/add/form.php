
<style>
.fb-editor {
	padding: 0;
	margin: 0;
}

.fb-add-el {
	padding: 10px;
	border: 1px dotted #565656;
	cursor: pointer;
	text-align: center;
}

.fb-add-el:hover {
	background-color: #efefef;
}

.fb-select-elem {
	cursor: pointer;
}

.fb-select-elem:hover {
	background-color: #efefef;
}
</style>
<div class="row">
	<div class="col-md-12">
		<h4>Form Builder</h4>
		<hr />
	</div>
</div>

<div class="fb-editor"></div>



<script>

let FB = {
	id: (Math.ceil(Math.random() * 1000000)),
	el: "",
	el_modal: "",
	init: function(el){
		this.el = el;
		let el_modal = this.el_modal = "modal-" + (Math.ceil(Math.random() * 10000));
		let c_el = $(this.el);
		
		c_el.after('\
			<div class="modal fade" id="'+ this.el_modal +'">\
				<div class="modal-dialog">\
					<div class="modal-content">\
						<div class="modal-header">\
							<h4 class="modal-title"><span class="fa fa-plus"></span> Add Form Element</h4>\
							<button type="button" class="close" data-dismiss="modal">&times;</button>\
						</div>\
						\
						<div class="modal-body">\
							'+ this.showAllElements() +'\
						</div>\
						\
						<div class="modal-footer">\
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>\
						</div>\
					</div>\
				</div>\
			</div>\
		');
		
		c_el.attr("data-fb-id", this.id);
		c_el.html('\
			<div class="fb-add-el" data-fb="'+ this.id +'" data-fb-for="'+ this.el +'"><span class="fa fa-plus"></span> Add Element</div>\
		');
		
		$(document).on("click", ".fb-add-el[data-fb="+ this.id +"]", function(){
			$("#" + el_modal).attr("data-fb-for", $(this).data("fb-for"));
			$("#" + el_modal).modal("toggle");
		});
		
		$(document).on("click", ".fb-select-elem[data-fb="+ this.id +"]", function(){
			$("#" + el_modal).modal("toggle");
			
			let scode = $(this).data("fb-el-code");
			let hel = FB.elements.find(x => x.code == scode);
			let parent = $("#" + el_modal).data("fb-for");
			
			if(hel != undefined){
				switch(hel.code){
					case "single-col":
						$(parent).append();
					break;
				}
				c_el.prepend(hel.html);
			}
		});
	},
	reload: function() {
		
	},
	showAllElements: function(){
		let c = '<div class="list-group">';
		let fbid = this.id;
		
		this.elements.forEach(function(x){
			c += '<div class="list-group-item fb-select-elem" data-fb="'+ fbid +'" data-fb-el-code="'+ x.code +'">'+ x.name +'</div>';
		});
		
		c += '</div>';
		
		return c;
	},
	elements: [
		{
			"name": "Full Row",
			"elem": "div",
			"code": "single-col",
			"html": '\
				<div class="row"><div class="col-md-12 full-row"></div></div>\
			'
		},
		{
			"name": "Two Column",
			"elem": "div",
			"code": "two-col",
			"html": '\
				<div class="row"><div class="col-md-6 two-column"></div><div class="col-md-6 two-column"></div></div>\
			'
		},
		{
			"name": "Three Column",
			"elem": "div",
			"code": "three-col",
			"html": '\
				<div class="row"><div class="col-md-4 three-column"></div><div class="col-md-4 three-column"></div><div class="col-md-4 three-column"></div></div>\
			'
		},
		{
			"name": "Text Input",
			"elem": "input",
			"code": "input-text",
			"html": '<input type="text" class="form-control" placeholder="Text Input" />'
		}
	],
	addElement: function() {
		
	}
}

FB.init(".fb-editor");
</script>