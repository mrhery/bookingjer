function prepareCalendar(id, action = {}){
	$(id).addClass("calendar-container");
	$(id).html('\
		<header class="calendar-header">\
			<p class="calendar-current-date"></p>\
			<div class="calendar-navigation">\
				<span class="calendar-calendar-prev">\
					<span class="fa fa-chevron-left"></span>\
				</span>\
				\
				<span class="calendar-calendar-next">\
					<span class="fa fa-chevron-right"></span>\
				</span>\
			</div>\
		</header>\
		\
		<table class="table table-hover table-fluid table-bordered">\
			<thead class="calendar-dates-header">\
				<tr>\
					<th>Sun</th>\
					<th>Mon</th>\
					<th>Tue</th>\
					<th>Wed</th>\
					<th>Thu</th>\
					<th>Fri</th>\
					<th>Sat</th>\
				</tr>\
			</thead>\
			\
			<tbody class="calendar-dates-item"></tbody>\
		</table>\
	');
	
	let date = new Date();
	let year = date.getFullYear();
	let month = date.getMonth();
	let selected_dates = {};

	const $day = $(id + " > table > .calendar-dates-item");

	const months = [
		"January",
		"February",
		"March",
		"April",
		"May",
		"June",
		"July",
		"August",
		"September",
		"October",
		"November",
		"December"
	];

	const manipulate = () => {
		if (month < 0 || month > 11) {
			date = new Date(year, month, new Date().getDate());
			year = date.getFullYear();
			month = date.getMonth();
		} else {
			date = new Date();
		}
		
		let dayone = new Date(year, month, 1).getDay();
		let lastdate = new Date(year, month + 1, 0).getDate();
		let dayend = new Date(year, month, lastdate).getDay();
		let monthlastdate = new Date(year, month, 0).getDate();
		let lit = "";
		let cDay = 0;
		
		for (let i = dayone; i > 0; i--) {
			if(cDay == 0){
				lit += "<tr>";
			}
			
			cDay++;
			
			let cDate =  year + '-' + (month < 2 ? 12 : (month - 1)) + '-' + (monthlastdate - i + 1);
			let cDateActive = "";
			
			if(selected_dates[cDate] != undefined){
				cDateActive = "selected";
			}
			
			lit +=
				'<td class="inactive select-date '+ cDateActive +'" data-date="'+ cDate +'">' + (monthlastdate - i + 1) +'</td>';
				
			if(cDay == 7){
				lit += "</tr>";
				cDay = 0;
			}
		}
		
		for (let i = 1; i <= lastdate; i++) {
			if(cDay == 0){
				lit += "<tr>";
			}
			
			cDay++;
			
			let cDate =  year +'-'+ month +'-'+ i;
			let cDateActive = "";
			
			if(selected_dates[cDate] != undefined){
				cDateActive = "selected";
			}
			
			let isToday = i === date.getDate()
				&& month === new Date().getMonth()
				&& year === new Date().getFullYear()
				? "active"
				: "";
			lit += '<td class="'+ isToday +' select-date '+ cDateActive +'" data-date="'+ cDate +'">' + i + '</td>';
			
			if(cDay == 7){
				lit += "</tr>";
				cDay = 0;
			}
		}
		
		for (let i = dayend; i < 6; i++) {
			if(cDay == 0){
				lit += "<tr>";
			}
			
			cDay++;
			let cDate =  year +'-'+ (month == 12 ? 1 : (month + 1)) +'-'+ (i - dayend + 1);
			let cDateActive = "";
			
			if(selected_dates[cDate] != undefined){
				cDateActive = "selected";
			}
			
			lit += '<td class="inactive select-date '+ cDateActive +'" data-date="'+ cDate +'">'+ (i - dayend + 1) +'</td>';
			
			if(cDay == 7){
				lit += "</tr>";
				cDay = 0;
			}
		}
		
		lit += "</tr>";
		$(id + " > header > .calendar-current-date").text(`${months[month]} ${year}`);
		$day.html(lit);
	}

	manipulate();

	$(document).on("click", id + " > table > tbody > tr > .select-date", function(){		
		if($(this).hasClass("selected")){
			$(this).removeClass("selected");
			
			delete selected_dates[$(this).data("date")];
		}else{
			$(this).addClass("selected");
			selected_dates[$(this).data("date")] = true;
		}
		
		if(action["onSelectDate"] != undefined){
			action["onSelectDate"]($(this).data("date"), Object.keys(selected_dates))
		}
	});

	$(document).on("click", id + " > header > .calendar-navigation > .calendar-calendar-prev", function(){
		month--;
		
		manipulate();
	});

	$(document).on("click", id + " > header > .calendar-navigation > .calendar-calendar-next", function(){
		month++;
		
		manipulate();
	});
}