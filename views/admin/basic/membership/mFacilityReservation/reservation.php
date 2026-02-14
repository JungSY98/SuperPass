<style>
.fc-event-main {
	position:relative;
}
.fc-event-main {
	position:relative;
}
.fc-event-main i {
	position:absolute;
	bottom:5px;
	right:5px;
}
</style>
<div class="box">
    <div class="box-header">



<link href='/assets/fullCalendar-5.11/lib/main.css' rel='stylesheet' />
<script src='/assets/fullCalendar-5.11/lib/main.js'></script>
<script src='/assets/fullCalendar-5.11/lib/locales-all.js'></script>


<link rel="stylesheet" href="/assets/css/jquery.timepicker.min.css">
<script src='/assets/js/jquery.timepicker.min.js'></script>

<script>
var nowDate = new Date();
function dateFormat(date) {
	let month = date.getMonth() + 1;
	let day = date.getDate();
	let hour = date.getHours();
	let minute = date.getMinutes();
	let second = date.getSeconds();

	month = month >= 10 ? month : '0' + month;
	day = day >= 10 ? day : '0' + day;
	hour = hour >= 10 ? hour : '0' + hour;
	minute = minute >= 10 ? minute : '0' + minute;
	second = second >= 10 ? second : '0' + second;

	return date.getFullYear() + '-' + month + '-' + day + ' ' + hour + ':' + minute;
}


var reserveData = new Array();

document.addEventListener('DOMContentLoaded', function() {

	$.ajax({
		url: "/admin/site/facilityReservation/ajaxGetReservationData/",
		type: "POST",
		dataType: "html",
		data: {
			'itemNo' : "<?=$viewItem?>",
			'comNo' : "<?=$matchComD['no']?>",
			'memNo' : "<?=$this->member->item('mem_id')?>",
			'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
		},
		success: function(data){
			data = $.parseJSON(data);
			//console.log(data);
			reserveData = data;
			callCalendar(reserveData);
			
		}
	});

});
function setItemRemove() {
	$(".fc-event-main").each(function() {
		var bgColor = $(this).parent().css("background-color");
		var rDate = $(this).parent().parent().parent().parent().parent().attr("data-date");
		var rTime = $(this).find(".fc-event-time").text();
		var rName = $(this).find(".fc-event-title").text();
		
		$(this).append('<i class="fa-solid fa-xmark" data-date="'+rDate+'" data-time="'+rTime+'" data-name="'+rName+'" onclick="return fnDeleteReservation(this)"></i>');

	});
}
function fnDeleteReservation(obj) {
	if (confirm("정말 삭제하시겠습니까?")) {
		$.ajax({
			url: "/admin/site/facilityReservation/ajaxDeleteReservationData/",
			type: "POST",
			dataType: "html",
			data: {
				'reserveTitle' : $(obj).attr("data-name"),
				'reserveDate' : $(obj).attr("data-date"),
				'reserveTime' : $(obj).attr("data-time"),
				'itemNo' : "<?=$viewItem?>",
				'comNo' : "<?=$matchComD['no']?>",
				'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
			},
			success: function(data){
				if (data=='OK') {
					alert("삭제 되었습니다.");
					location.reload();
					//$(obj).parent().parent().parent().remove();
				} else {
					alert("문제가 발생하였습니다. 다시 시도하여 주세요");
				}
			}
		});
		
	}
	//alert($(obj).attr("data-time"));
}
function callCalendar(reserveData) {

	var calendarEl = document.getElementById('calendar');
	var calendar = new FullCalendar.Calendar(calendarEl, {
		initialDate: '<?=date("Y-m-d")?>',
		initialView: 'timeGridWeek',
		nowIndicator: true,
		height: '100%',
		expandRows: true,
		headerToolbar: {
			left: 'prev,next today',
			center: 'title',
			right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
		},
		navLinks: true, // can click day/week names to navigate views
		editable: true,
		slotLabelInterval:"01:00",
		//slotDuration:"01:00:00",
		allDaySlot:false,
		selectable: true,
		selectMirror: true,
		slotMaxTime:"<?=$itemD[$viewItem]['etime']?>:00:00",
		slotMinTime:"10:00:00",
		snapDuration:"2:00:00",
		slotEventOverlap:true,
		//hiddenDays: [ 0 ],
		selectConstraint: "businessHours",
		select: function(arg) {
			var ss = new Date(arg.start);
			var ee = new Date(arg.end);
			var diffTime = (ee.getTime() - ss.getTime()) / (1000*60*60);

			if (confirm("<?=$matchComD['companyName']?> 회원님 \n"+dateFormat(ss)+" 부터 "+dateFormat(ee)+" 까지 \n<?=$itemD[$viewItem]['pname']?>을(를) 예약 하시겠습니까?")) {
			var title = "<?=$matchComD['companyName']?>";
			if (title) {
				// ajax DB 처리 필 
				$.ajax({
					url: "/admin/site/facilityReservation/ajaxSetReservation/",
					type: "POST",
					dataType: "html",
					data: {
						'title' : "<?=addslashes($matchComD['companyName'])?>",
						"reserveStart" : arg.start,
						"reserveEnd" : arg.end,
						"itemNo" : "<?=$viewItem?>",
						"memNo" : "<?=$this->member->item('mem_id')?>",
						"comNo" : "<?=$matchComD['no']?>",
						'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
					},
					success: function(data){
						location.reload();
						calendar.addEvent({
							keyNo : data,
							title: title,
							start: arg.start,
							end: arg.end,
							allDay: arg.allDay,
							overlap: false,
						})
					}
				});
			}
			calendar.unselect();
		} else {
			calendar.unselect();
			return false;
		}
	},
	/*
	validRange: {
	start: '<?=date("Y-m-d")?>',
	end: '<?=date("Y-m-d", strtotime("+ 1 month"))?>'
	},
	*/
	droppable: true, // this allows things to be dropped onto the calendar
	drop: function() {
		// is the "remove after drop" checkbox checked?
		if ($('#drop-remove').is(':checked')) {
			// if so, remove the element from the "Draggable Events" list
			$(this).remove();
		}
	},
	eventClick: function(info) {
		//alert('Event: ' + info.event.title);
		//alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
		//alert('View: ' + info.view.type);

		// change the border color just for fun
		info.el.style.borderColor = 'red';
	},
	eventChange:function(arg) {
		//console.log(arg);
		var ss = new Date(arg.event.start);
		var ee = new Date(arg.event.end);
		var diffTime = (ee.getTime() - ss.getTime()) / (1000*60*60);

		if (ss<nowDate) { 
			alert("지난 날/시간은 예약하실 수 없습니다.");
			calendar.unselect()
			arg.revert();
			return false;
		}
// event.setDates
		if (confirm(""+dateFormat(ss)+" 부터 "+dateFormat(ee)+" 까지 \n<?=$itemD[$viewItem]['pname']?>을(를) 예약 변경 하시겠습니까?")) {
			var title = "<?=$matchComD['companyName']?>";
			if (title) {
				$.ajax({
					url: "/admin/site/facilityReservation/ajaxChangeReservation/",
					type: "POST",
					dataType: "html",
					data: {
						'title' : "<?=addslashes($matchComD['companyName'])?>",
						"reserveStart" : arg.event.start,
						"reserveEnd" : arg.event.end,
						"itemNo" : "<?=$viewItem?>",
						"memNo" : "<?=$this->member->item('mem_id')?>",
						"comNo" : "<?=$matchComD['no']?>",
						"keyNo" : arg.event._def.extendedProps.keyNo,
						'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
					},
					success: function(data){
						calendar.addEvent({
							keyNo : arg.event._def.extendedProps.keyNo,
							title: title,
							start: arg.start,
							end: arg.end,
							allDay: arg.allDay,
							overlap: false,
						})
					}
				});
			}
			calendar.unselect();
		} else {
			calendar.unselect();
			return false;
		}
	},
	dateClick: function(arg) {
		console.log(arg.date.toString()); // use *local* methods on the native Date Object
		// will output something like 'Sat Sep 01 2018 00:00:00 GMT-XX:XX (Eastern Daylight Time)'
	},
	dayMaxEvents: true, // allow "more" link when too many events
	businessHours: [ // specify an array instead
		{
			daysOfWeek: [ 1, 2, 3, 4, 5 ], // Monday, Tuesday, Wednesday, Thursday, Friday
			startTime: "10:00", // 8am
			endTime: "<?=$itemD[$viewItem]['etime']?>:00" // 6pm
		},
		{
			daysOfWeek: [ 6, 0 ], // Saturday
			startTime: "10:00", // 10am
			endTime: "<?=$itemD[$viewItem]['wetime']?>:00" // 4pm
		}
	],
	eventConstraint:"businessHours",
	selectOverlap: function(event) {
		return event.rendering === 'background';
	},
	events: reserveData
	});
	calendar.setOption('locale', 'ko');
	calendar.render();

	setResponsive();
	setItemRemove();

}
</script>
<style>
  #calendar {
/*     max-width: 1100px;
    margin: 0 auto; */
  }
  #calendar-container {
    position: relative;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
	width:100%;
	height:80vh;
	min-height:800px;
  }
  .fc-header-toolbar {
    /*
    the calendar will be butting up against the edges,
    but let's scoot in the header's buttons
    */
    padding-top: 1em;
    padding-left: 1em;
    padding-right: 1em;
  }
  h2.resourceH2 {
	margin-top:30px;
  }
  h2.resourceH2 span {
	font-size:70%;
  }
ul.ulReserveItem {
	padding:0px;
}
ul.ulReserveItem li {
	list-style:none;
}
</style>



<ul class="ulReserveItem row">
<? foreach($facility2D as $k => $iD) { ?>
	<li class="col <?=$viewItem==$iD['no']?'active':''?>"><a href="/admin/membership/mFacilityReservation/?viewItem=<?=$iD['no']?>"><?=$iD['pname']?></a></li>
<? } ?>
</ul>



<div class="btn-group w-100 mt-5 mb-5 pt-5" style="border:0px;">
<button class="btn btn-outline-warning fBlack borderBlack" onclick="return fnSetReservation()"><?=$itemD[$viewItem]['pname']?> 관리자 직접 예약하기</button>
</div>


  <div id='calendar-container'>
    <div id='calendar'></div>
  </div>


<div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel"><?=$itemD[$viewItem]['pname']?> 예약하기</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-3">날짜 선택</div>
					<div class="col-9"><input type="date" name="rDate" class="form-control datepicker" placeholder="예약 날짜를 선택하세요"></div>
				</div>
				<hr>
				<div class="row">
					<div class="col-3">시간 선택</div>
					<div class="col-9">
						<div class="input-group">
							<span class="input-group-text">시작 시간</span>
							<select name="rTimeS" class="form-control" disabled placeholder="예약 시작 시간을 선택하세요">
								<option value="">시작 시간을 선택하세요</option>
							</select>
							<span class="input-group-text">종료 시간</span>
							<select name="rTimeE" class="form-control" disabled placeholder="예약 종료 시간을 선택하세요">
								<option value="">종료 시간을 선택하세요</option>
							</select>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-3">멤버십 사용자</div>
					<div class="col-9">
						<select name="reserveTitle" class="form-control">
							<option value="">선택하세요</option>
<? foreach($membershipList as $k => $mD) { ?>
							<option value="<?=$mD['mem_id']?>" data-mid="<?=$mD['mem_userid']?>"><?=$k+1?> _ <?=$mD['mem_username']?></option>
<? } ?>
						</select>
					<!-- <input type="text" name="reserveTitle" class="form-control" value="" placeholder="기업명을 입력하세요" readonly> -->
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-3">사용인원</div>
					<div class="col-9">
						<select name="reserveCnt" class="form-control">
							<option value="">사용인원을 선택하세요</option>
<? for($a=1;$a<=10;$a++) { ?>
							<option value="<?=$a?>"><?=$a?> 명</option>
<? } ?>
						</select>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">창닫기</button>
				<button type="button" class="btn btn-dark" onclick="return fnSaveReserve()">예약하기</button>
			</div>
		</div>
	</div>
</div>

<script>
var stime = "<?=$itemD[$viewItem]['stime']?>";
var wstime = "<?=$itemD[$viewItem]['wstime']?>";
var etime = "<?=$itemD[$viewItem]['etime']+1?>";
var wetime = "<?=$itemD[$viewItem]['wetime']+1?>";
var isWeekend;
function fnSetReservation() {
	$("input[name=rDate]").val('');
	$("select[name=rTimeS] option").remove();
	$("select[name=rTimeE] option").remove();
	$("select[name=rTimeS").attr("disabled", true);
	$("select[name=rTimeE").attr("disabled", true);
	$("select[name=reserveCnt").val('');
	$("#reservationModal").modal("show");
}
$('.datepicker').datepicker({
	beforeShowDay: function(date){
		var day = date.getDay();
		return [(day != 9)];
	},
	dateFormat: 'yy-mm-dd',
	language: 'kr',
	autoclose: true,
	todayHighlight: true,
	autoSize:true,
	changeYear: true,
	changeMonth: true,
	yearRange:"1950:2025",
	prevText: '이전 달',
	nextText: '다음 달',
	minDate: 0,
	monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
	monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
	dayNames: ['일', '월', '화', '수', '목', '금', '토'],
	dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
	dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
	showMonthAfterYear: true,
	yearSuffix: '년 '
});

$("input[name=rDate]").on("change", function() {
	$("select[name=rTimeS] option").remove();
	$("select[name=rTimeE] option").remove();
	$("select[name=rTimeS").attr("disabled", true);
	$("select[name=rTimeE").attr("disabled", true);
	$.ajax({
		url: "/admin/membership/mFacilityReservation/ajaxGetReservationTime/",
		type: "POST",
		dataType: "html",
		data: {
			'rDate' : $(this).val(),
			"itemNo" : "<?=$viewItem?>",
			"memNo" : "<?=$this->member->item('mem_id')?>",
			"comNo" : "<?=$matchComD['no']?>",
			"type" : "start",
			'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
		},
		success: function(data){
			data = $.parseJSON(data);
			$("select[name=rTimeS").html(data.html);
			$("select[name=rTimeS").attr("disabled", false);
		}
	});
});
$("select[name=rTimeS").on("change", function() {
	$("select[name=rTimeE] option").remove();
	$.ajax({
		url: "/tenant/ajaxGetReservationTime/",
		type: "POST",
		dataType: "html",
		data: {
			'rDate' : $("input[name=rDate]").val(),
			"itemNo" : "<?=$viewItem?>",
			"memNo" : "<?=$this->member->item('mem_id')?>",
			"comNo" : "<?=$matchComD['no']?>",
			"type" : "end",
			"rTimeS" : $(this).val(),
			'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
		},
		success: function(data){
			data = $.parseJSON(data);
			$("select[name=rTimeE").html(data.html);
			$("select[name=rTimeE").attr("disabled", false);
		}
	});
});
function fnSaveReserve() {
	var rDate = $("input[name=rDate").val();
	var rTimeS = $("select[name=rTimeS").val();
	var rTimeE = $("select[name=rTimeE").val();
	var reserveCnt = $("select[name=reserveCnt").val();
	if (rDate=='') {
		alert("예약할 날짜를 선택하세요");
		$("input[name=rDate").focus();
		return false;
	}
	if (rTimeS=='') {
		alert("예약 시작 시간을 선택하세요");
		$("select[name=rTimeS").focus();
		return false;
	}
	if (rTimeE=='') {
		alert("예약 종료 시간을 선택하세요");
		$("select[name=rTimeE").focus();
		return false;
	}
	if (reserveCnt=='') {
		alert("예약 인원을 선택하세요");
		$("select[name=reserveCnt").focus();
		return false;
	}

	var mem_id = $("select[name=reserveTitle] option:selected").val();
	var memID = $("select[name=reserveTitle] option:selected").attr("data-mid");
	var mem_name = $("select[name=reserveTitle] option:selected").text();

	$.ajax({
		url: "/admin/membership/mFacilityReservation/ajaxSaveReservation/",
		type: "POST",
		dataType: "html",
		data: {
			'rDate' : rDate,
			'rTimeS' : rTimeS,
			'rTimeE' : rTimeE,
			'reserveCnt' : reserveCnt,
			'reserveTitle' : mem_name,
			"itemNo" : "<?=$viewItem?>",
			"memNo" : mem_id,
			"memID" : memID,
			"comNo" : mem_id+1000,
			'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
		},
		success: function(data){
			alert(data);
			location.reload();
		}
	});
}
$(window).resize(function() {
	setResponsive()
});
function setResponsive() {
	if ($(window).width()<800) {
		$(".fc-toolbar").find('button[title="월"]').addClass("d-none");
		$(".fc-toolbar").find('button[title="일"]').click();
	} else {
		$(".fc-toolbar").find('button[title="월"]').removeClass("d-none");
		$(".fc-toolbar").find('button[title="주"]').click();
	}
}

</script>

</div>
</div>