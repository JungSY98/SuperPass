<div class="box">
	<div class="box-header">

		<div class="divSearchWrap">
			<h3>통합 검색</h3>
			<input type="text" class="form-control p-3" name="searchTxt" placeholder="검색어를 입력하세요">

			<div class="divSearchResult pt-5">
				<div class="row">
					<div class="col-sm-12">
						<h4>멤버십 회원 _ 검색 결과</h4>
						<hr>
						<div class="divSearchResultList pt-3 pb-3 text-center">
						</div>

						<div class="divUsageInfo">
							<div class="row mb-5">
								<div class="col-sm-4">
									<h5>사용 대상</h5>
									<input type="text" name="useWhat" class="form-control" value="라운지">
								</div>
								<div class="col-sm-8">
									<h5>사용 일자/시간</h5>
									<div class="input-group">
									<input type="date" class="form-control datepicker" name="useWhen" value="<?=date("Y-m-d")?>">
									<span class="input-group-text">시작 시간</span>
									<input type="text" class="form-control timepicker" name="useTimeS" value="<?=date("H:i")?>">
									<span class="input-group-text"> 종료 시간(예상) </span>
									<input type="text" class="form-control timepicker" name="useTimeE" value="<?=date("H:i", strtotime("+2 hour"))?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<h5>메모</h5>
									<textarea name="useMemo" class="form-control" rows="5" placeholder="메모를 남겨주세요"></textarea>
								</div>
							</div>
							<div class="row mt-2">
								<div class="col-sm-12">
									<button type="button" class="btn btn-success w-100" onclick="return fnRegUsage()">등록하기</button>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		
		</div>

		<div class="divCurrentUsage mt-5">
			<div class="row">
				<div class="col-sm-12">

					<h3>현재 사용 현황</h3>
					<table class="table align-middle text-center">
						<tr>
							<th>사용자 구분</th>
							<th>이름(아이디)</th>
							<th>사용장소</th>
							<th>시작 시간</th>
							<th>종료 시간(예상)</th>
							<th>메모</th>
							<th class="col-sm-1">퇴실시간</th>
							<th>퇴실처리</th>
						</tr>
<? foreach($usageD as $k => $uD) { ?>
						<tr>
							<td><?=$uD['title']?></td>
							<td><?=$uD['userName']?>(<?=$uD['userID']?>)</td>
							<td><?=$uD['useWhat']?></td>
							<td><?=$uD['useWhen']?> <?=$uD['useTimeS']?></td>
							<td><?=$uD['useTimeE']?></td>
							<td><?=$uD['useMemo']?></td>
							<td><input type="text" class="form-control outDate" id="outDate_<?=$uD['no']?>" name="outDate" value="<?=date("H:i:s")?>" ></td>
							<td><button type="button" class="btn btn-danger" onclick="return fnUserOut('<?=$uD['no']?>')">퇴실처리</button></td>
						</tr>
<? } ?>
<? foreach($usageGuestD as $k => $uD) { ?>
						<tr>
							<td>게스트</td>
							<td><?=$uD['userName']?></td>
							<td><?=$uD['useWhat']?></td>
							<td><?=$uD['useWhen']?> <?=$uD['useTimeS']?></td>
							<td><?=$uD['useTimeE']?></td>
							<td><?=$uD['useMemo']?></td>
							<td><input type="text" class="form-control outDate" id="outDate2_<?=$uD['no']?>" name="outDate2" value="<?=date("H:i:s")?>" ></td>
							<td><button type="button" class="btn btn-danger" onclick="return fnGuestOut('<?=$uD['no']?>')">퇴실처리</button></td>
						</tr>
<? } ?>
					</table>
				</div>
				<div class="col-sm-12">
					<h3>금일 퇴실 현황</h3>
					<table class="table align-middle text-center">
						<tr>
							<th>사용자 구분</th>
							<th>이름(아이디)</th>
							<th>사용장소</th>
							<th>시작 시간</th>
							<th>종료 시간(예상)</th>
							<th>메모</th>
							<th>퇴실시간</th>
						</tr>
<? foreach($doneUsageD as $k => $uD) { ?>
						<tr>
							<td><?=$uD['title']?></td>
							<td><?=$uD['userName']?>(<?=$uD['userID']?>)</td>
							<td><?=$uD['useWhat']?></td>
							<td><?=$uD['useWhen']?> <?=$uD['useTimeS']?></td>
							<td><?=$uD['useTimeE']?></td>
							<td><?=nl2br($uD['useMemo'])?></td>
							<td><?=$uD['outDate']?></td>
						</tr>
<? } ?>
<? foreach($doneUsageGuestD as $k => $uD) { ?>
						<tr>
							<td>게스트</td>
							<td><?=$uD['userName']?></td>
							<td><?=$uD['useWhat']?></td>
							<td><?=$uD['useWhen']?> <?=$uD['useTimeS']?></td>
							<td><?=$uD['useTimeE']?></td>
							<td><?=nl2br($uD['useMemo'])?></td>
							<td><?=$uD['outDate']?></td>
						</tr>
<? } ?>
					</table>
				</div>
			</div>

		</div>
	</div>
</div>

<link href="/assets/css/mdtimepicker.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="/assets/js/mdtimepicker.js"></script>
<script>
var selectUserNo='';
var membershipNo = '';
var chgOutDate = setInterval(function() {
	var today = new Date();  
	var hours = today.getHours(); // 시
	hours = hours < 10 ? '0'+hours : hours;
	var minutes = today.getMinutes();  // 분
	var seconds = today.getSeconds();  // 초
	seconds = seconds < 10 ? '0'+seconds : seconds;
	$(".outDate").val(hours+":"+minutes+":"+seconds);
}, 60000);
function fnUserOut(useNo) {
	if (confirm("정말 퇴실 처리하시겠습니까?")) {
		$.ajax({
			url: "/admin/membership/usage/ajaxMakeOut/",
			type: "POST",
			dataType: "html",
			data: {
				'useNo' : useNo,
				'outDate' : $("#outDate_"+useNo).val(),
				'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
			},
			success: function(data){
				if (data=='OK') {
					alert("퇴실 처리 되었습니다.");
				} else alert(data);
				location.reload();
			}
		});
	}
}
function fnGuestOut(useNo) {
	if (confirm("정말 퇴실 처리하시겠습니까?")) {
		$.ajax({
			url: "/admin/membership/usage/ajaxMakeOutGuest/",
			type: "POST",
			dataType: "html",
			data: {
				'useNo' : useNo,
				'outDate' : $("#outDate2_"+useNo).val(),
				'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
			},
			success: function(data){
				if (data=='OK') {
					alert("퇴실 처리 되었습니다.");
				} else alert(data);
				location.reload();
			}
		});
	}
}

function fnSelectUser(no, mNo, mID, mName) {
	selectUserNo = no;
	membershipNo = mNo;
	$(".selectTR").removeClass("bg-info");
	$("#selectTR_"+no).addClass("bg-info");
}
function fnRegUsage() {
	if (selectUserNo=='') {
		alert("사용자를 검색을 통해 선택하여 주세요");
		$("input[name=searchTxt]").focus();
		return false;
	}
	if ($("input[name=useWhat]").val()=='') {
		alert("사용 대상을 입력하여 주세요");
		$("input[name=useWhat]").focus();
		return false;
	}
	if ($("input[name=useWhen]").val()=='') {
		alert("사용 일시를 입력하여 주세요");
		$("input[name=useWhen]").focus();
		return false;
	}
	if ($("input[name=useTimeS]").val()=='') {
		alert("사용 시작 시간을 입력하여 주세요");
		$("input[name=useTimeS]").focus();
		return false;
	}
	if ($("input[name=useTimeE]").val()=='') {
		alert("사용 종료 시간을 입력하여 주세요");
		$("input[name=useTimeE]").focus();
		return false;
	}
	$.ajax({
		url: "/admin/membership/usage/ajaxAddUsage/",
		type: "POST",
		dataType: "html",
		data: {
			'selectUserID' : $("#selectTR_"+selectUserNo).find("td").eq(2).html(),
			'userName' : $("#selectTR_"+selectUserNo).find("td").eq(1).html(),
			'membershipNo' : membershipNo,
			'useWhat' : $("input[name=useWhat]").val(),
			'useWhen' : $("input[name=useWhen]").val(),
			'useTimeS' : $("input[name=useTimeS]").val(),
			'useTimeE' : $("input[name=useTimeE]").val(),
			'useMemo' : $("textarea[name=useMemo]").val(),
			'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
		},
		success: function(data){
			if (data=='OK') {
				alert("저장되었습니다.");
			} else alert(data);
			location.reload();
		}
	});
}
$('.timepicker').mdtimepicker({
	timeFormat: 'hh:mm:ss.000', // format of the time value (data-time attribute)
	format: 'hh:mm tt',    // format of the input value
	readOnly: false,       // determines if input is readonly
	hourPadding: false,
	theme: 'green',
	okLabel: '선택',
	cancelLabel: '취소',
});
$("input[name=searchTxt]").on("keyup", function() {
	var text = $(this).val();
	const reg = /[\{\}\[\]\/?.,;:|\)*~`!^\-_+<>@\#$%&\\\=\(\'\"]/gi;
	text = text.replace(reg,'');
	if (text != '') {
		$.ajax({
			url: "/admin/membership/usage/ajaxSearchUser/",
			type: "POST",
			dataType: "html",
			data: {
				'searchTxt' : text,
				'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
			},
			success: function(data){
				var data = $.parseJSON(data);
				$("div.divSearchResult").slideDown();
				console.log(data);
				if (data.length == 0) {
					$(".divSearchResultList").html("<h5 class='text-danger'>검색 결과가 없습니다.</h5>");
				} else {
					var html = "<table class='table mb-3 align-middle'>";
					html += "<tr>";
					html += "<th>멤버십</th>";
					html += "<th>이름</th>";
					html += "<th>아이디</th>";
					html += "<th>연락처</th>";
					html += "<th>이메일</th>";
					html += "<th>카드번호</th>";
					html += "<th>구분/분류</th>";
					html += "<th>사용등록</th>";
					html += "</tr>";

					for (var a=0 ; a<data.length ; a++ ) {
						html += "<tr class='selectTR' id='selectTR_"+data[a].no+"'>";
						html += "<td>"+data[a].mTitle+"</td>";
						html += "<td>"+data[a].aName+"</td>";
						html += "<td>"+data[a].applyID+"</td>";
						html += "<td>"+data[a].aPhone+"</td>";
						html += "<td>"+data[a].aEmail+"</td>";
						html += "<td>"+data[a].cardNo+"</td>";
						html += "<td>"+data[a].adminType+"/"+data[a].adminCate+"</td>";
						html += '<td><button type="button" class="btn btn-dark" onclick="fnSelectUser(\''+data[a].no+'\', \''+data[a].membershipNo+'\', \''+data[a].applyID+'\', \''+data[a].aName+'\')">선택</button></td>';
						html += "</tr>";
					}
					html += "</table>";
					$(".divSearchResultList").html(html);
				}
			}
		});
	} else {
		$(".divSearchResultList").html("검색어를 입력하여 주세요");
	}
});
</script>