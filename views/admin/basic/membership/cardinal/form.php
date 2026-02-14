<style>
.form-control {
	padding:10px;
	height:50px;
	font-size:16px;
}
.control-label {
	padding-top:12px;
	font-size:16px;
	font-weight:300;
}
.ui-datepicker, .ui-timepicker-container{
	z-index:2000 !important;
}
<? if (element("pCate", $membershipD)!=2) { ?>
.form2 {
	display:none;
}
<? } ?>
</style>
<link rel="stylesheet" type="text/css" href="/assets/css/jquery.timepicker.min.css" />
<script type="text/javascript" src="/assets/js/jquery.timepicker.min.js"></script>

<div class="box">
	<div class="box-header">

<?=form_open_multipart("/admin/membership/cardinal/save/", array("method"=>"post"), array("no"=>$no, "membershipID"=>element("cardinal", $membershipD)))?>
		<button type="submit" class="btn btn-primary w-100 mb-5">저장하기</button>

		<div class="form-group row mb10">
			<label class="col-sm-2 control-label"> 모집 기수</label>
			<div class="col-sm-10">
				<input type="number" class="form-control" style="width:200px;" name="cardinal" required placeholder="모집 기수를 입력하세요" value="<?=element("cardinal", $membershipD)?>">
				※ <?=date("Ym")?> 형식으로 입력하여 주세요
			</div>
		</div>

		<hr class="clearfix">

		<div class="form-group row mb10">
			<label class="col-sm-2 control-label"> 모집 제목</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="title" required placeholder="제목을 회차를 입력하세요" value="<?=element("title", $membershipD) ? element("title", $membershipD) : date("Y년 m월")." 멤버십 모집"?>">
			</div>
		</div>

		<hr class="clearfix">

		<div class="form-group row mb10 bg-light pt-3 pb-3">
			<label class="col-sm-2 control-label">접수 기간</label>
			<div class="col-sm-10">
				<div class="input-group">
					<span class="input-group-text">시작일</span>
					<input type="text" class="form-control datepicker" name="applyS"  placeholder="접수 시작일을 선택하세요" value="<?=element("applyS", $membershipD) ? element("applyS", $membershipD) : date("Y-m-15")?>">
					<span class="input-group-text">마감일</span>
					<input type="text" class="form-control datepicker" name="applyE"  placeholder="접수 시작일을 선택하세요" value="<?=element("applyE", $membershipD) ? element("applyE", $membershipD) : date("Y-m-25")?>">
				</div>
			</div>
		</div>

		<hr class="clearfix">

		<div class="form-group row mb10 bg-light pt-3 pb-3">
			<label class="col-sm-2 control-label">적용 기간</label>
			<div class="col-sm-10">
				<div class="input-group">
					<span class="input-group-text">시작일</span>
					<input type="text" class="form-control datepicker" name="periodS"  placeholder="적용 기간 시작일을 선택하세요" value="<?=element("usePeriodS", $membershipD) ? element("usePeriodS", $membershipD) : date("Y-m-01", strtotime("+1 month"))?>">
					<span class="input-group-text">종료일</span>
					<input type="text" class="form-control datepicker" name="periodE"  placeholder="적용 기간 시작일을 선택하세요" value="<?=element("usePeriodE", $membershipD) ? element("usePeriodE", $membershipD) : date("Y-m-t",  strtotime("+1 month"))?>">
				</div>
			</div>
		</div>

		<hr class="clearfix">

		<div class="form-group row mb10 bg-light pt-3 pb-3">
			<label class="col-sm-2 control-label">접수 제한 인원</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="countLimit" placeholder="접수 제한 인원을 입력하세요" value="<?=element("countLimit", $membershipD)?>">
			</div>
		</div>

		<hr class="clearfix">

		<div class="form-group row mb10">
			<label class="col-sm-2 control-label">이용 신청 안내</label>
			<div class="col-sm-10">
				<div class="divApplyGuide">
					<div class="input-group-btn float-end">
						<p class="btn btn-sm btn-dark mt-4" onclick="fnAddSubTitle()">서브 타이틀 추가</p>
						<p class="btn btn-sm btn-danger mt-4" onclick="fnDelSubTitle()">서브 타이틀 삭제</p>
						<p class="btn btn-sm btn-light mt-4" onclick="fnAddDefault()">기본 설정 추가</p>
					</div>
					<h5>표시 내용 설정</h5>
					<p class="text-danger">※ 팝업 및 신청 페이지 상단에 자동 적용됩니다.</p>

					<div class="addComponent clearfix pb-5">
<? if (is_array(element("expJSON", $membershipD))) {?>
						<div class="input-group">
							<span class="input-group-text">타이틀</span>
							<input type="text" class="form-control" name="applyGuideH2" value="<?=element("applyGuideH2", element("expJSON", $membershipD))?>">
						</div>
<? if (is_array(element("subApplyGuide", element("expJSON", $membershipD)))) {?>
<? foreach(element("subApplyGuide", element("expJSON", $membershipD)) as $_k => $subTitleD) { ?>
						<div class="subTitle">
<? if ($_k==0) { ?>
							<div class="input-group mt-3 mb-3">
								<span class="input-group-text">서브 타이틀</span>
								<input type="text" class="form-control subApplyGuide" name="subApplyGuide[]" value="<?=$subTitleD?>">
								<input type="text" class="form-control inputApplyS datepicker" name="inputApplyS" value="<?=element("applyS", element("expJSON", $membershipD))?>">
								<span class="input-group-text">~</span>
								<input type="text" class="form-control inputApplyE datepicker" name="inputApplyE" value="<?=element("applyE", element("expJSON", $membershipD))?>">
								<button type="button" class="btn btn-info" onclick="fnAddSubTitleElement(<?=$_k?>)">항목 추가</button>
								<button type="button" class="btn btn-danger" onclick="fnDelSubTitleElement(<?=$_k?>)">항목 삭제</button>
							</div>
<? } else if ($_k==1) { ?>
							<div class="input-group mt-3 mb-3">
								<span class="input-group-text">서브 타이틀</span>
								<input type="text" class="form-control subApplyGuide" name="subApplyGuide[]" value="<?=$subTitleD?>">
								<input type="text" class="form-control inputPeriod" name="inputPeriod" value="<?=element("period", element("expJSON", $membershipD))?>">
								<input type="text" class="form-control inputPeriodS" name="inputPeriodS" value="<?=element("periodS", element("expJSON", $membershipD))?>">
								<span class="input-group-text">~</span>
								<input type="text" class="form-control inputPeriodE" name="inputPeriodE" value="<?=element("periodE", element("expJSON", $membershipD))?>">
								<span class="input-group-text">까지</span>
								<button type="button" class="btn btn-info" onclick="fnAddSubTitleElement(<?=$_k?>)">항목 추가</button>
								<button type="button" class="btn btn-danger" onclick="fnDelSubTitleElement(<?=$_k?>)">항목 삭제</button>
							</div>
<? } else { ?>
							<div class="input-group mt-3 mb-3">
								<span class="input-group-text">서브 타이틀</span>
								<input type="text" class="form-control subApplyGuide" name="subApplyGuide[]" value="<?=$subTitleD?>">
								<button type="button" class="btn btn-info" onclick="fnAddSubTitleElement(<?=$_k?>)">항목 추가</button>
								<button type="button" class="btn btn-danger" onclick="fnDelSubTitleElement(<?=$_k?>)">항목 삭제</button>
							</div>
<? } ?>
<? if (is_array(element($_k, element("subTitle", element("expJSON", $membershipD))))) {?>
<? foreach(element($_k, element("subTitle", element("expJSON", $membershipD))) as $_kk => $subElement) { ?>
							<div class="col-sm-11 offset-sm-1 subTitleElement">
								<div class="input-group mt-3 mb-3">
									<span class="input-group-text">항목 #<?=$_kk+1?></span>
									<input type="text" class="form-control subApplyGuide" name="subTitle<?=$_k?>[]" value="<?=$subElement?>">
								</div>
							</div>
<? } ?>
<? } ?>
						</div>
<? } ?>
						
<? } ?>
<? } ?>
					</div>

				</div>

				<textarea class="form-control d-none" name="explains" placeholder="이용 신청 안내를 입력하세요" rows="10"><?=element("explains", $membershipD)?></textarea>
			</div>
		</div>


		<hr class="clearfix">

		<div class="form-group row mb10">
			<label class="col-sm-2 control-label">이용 시 유의사항</label>
			<div class="col-sm-10">
				<textarea class="form-control" name="useGuide" placeholder="이용 시 유의사항을 입력하세요" required rows="10"><?=element("useGuide", $membershipD)?></textarea>
			</div>
		</div>


		<button type="submit" class="btn btn-primary w-100">저장하기</button>

<?=form_close()?>

	</div>
</div>


<script>
function fnAddDefault() {
	$.ajax({
		method: "POST",
		url: "/admin/membership/cardinal/ajaxGetDefaultGuide/",
		dataType: "html",
		data: { 
			'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
		}
	})
	.done(function(data) {
		data = $.parseJSON(data);
		
		$(".addComponent").html('');
		$(".addComponent").html(data.html);

		var applyS = $("input[name=applyS]").val();
		$("input[name=inputApplyS]").val(applyS.substr(0,10));
		var applyE = $("input[name=applyE]").val();
		$("input[name=inputApplyE]").val(applyE.substr(0,10));
		var periodS = $("input[name=periodS]").val();
		$("input[name=inputPeriod]").val(periodS.substr(0,4)+"년 "+periodS.substr(5,2)+"월");
		$("input[name=inputPeriodS]").val(periodS.substr(5,2)+". "+periodS.substr(8,2));
		var periodE = $("input[name=periodE]").val();
		$("input[name=inputPeriodE]").val(periodE.substr(5,2)+". "+periodE.substr(8,2));
		$("input[name=inputPeriodE]").val(periodE.substr(5,2)+". "+periodE.substr(8,2));
	});
}
function fnAddSubTitle() {
	var cnt = $(".subTitle").length;
	var html = '<div class="subTitle">';
	html += '<div class="input-group mt-3 mb-3">';
	html += '<span class="input-group-text">서브 타이틀</span>';
	html += '<input type="text" class="form-control subApplyGuide" name="subApplyGuide[]" value="">';
	html += '<button type="button" class="btn btn-info" onclick="return fnAddSubTitleElement('+cnt+')">항목 추가</button >';
	html += '<button type="button" class="btn btn-danger" onclick="return fnDelSubTitleElement('+cnt+')">항목 삭제</button >';
	html += '</div>';
	html += '</div>';
	$(".addComponent").append(html);
}
function fnDelSubTitle() {
	if (confirm("저장하지 않은 상태의 자료는 복구할 수 없습니다. \n\n정말 삭제하시겠습니까?")) {
		$(".subTitle").last().remove();
	}
}
function fnAddSubTitleElement(no) {
	var cnt = $(".subTitle").eq(no).find(".subTitleElement").length+1;
	var html = '<div class="col-sm-11 offset-sm-1 subTitleElement">';
	html += '<div class="input-group mt-3 mb-3">';
	html += '<span class="input-group-text">항목 #'+cnt+'</span>';
	html += '<input type="text" class="form-control subApplyGuide" name="subTitle'+no+'[]" value="">';
	html += '</div>';
	html += '</div>';
	$(".subTitle").eq(no).append(html);
}
function fnDelSubTitleElement(no) {
	if (confirm("저장하지 않은 상태의 자료는 복구할 수 없습니다. \n\n정말 삭제하시겠습니까?")) {
		$(".subTitle").eq(no).find(".subTitleElement").last().remove();
	}
}
function fnChgForm(type) {
	if (type==2) {
		$(".form"+type).css("display", "flex");
		$("input[name=pDate]").on("change", function() {
			$("input[name=pDate2]").val($(this).val());
		});
	} else {
		$(".form2").css("display", "none");
	}
}
function dataSync() {
	var applyS = $("input[name=applyS]").val();
	$("input[name=inputApplyS]").val(applyS.substr(0,10));
	var applyE = $("input[name=applyE]").val();
	$("input[name=inputApplyE]").val(applyE.substr(0,10));
	var periodS = $("input[name=periodS]").val();
	$("input[name=inputPeriod]").val(periodS.substr(0,4)+"년 "+periodS.substr(5,2)+"월");
	$("input[name=inputPeriodS]").val(periodS.substr(5,2)+". "+periodS.substr(8,2));
	var periodE = $("input[name=periodE]").val();
	$("input[name=inputPeriodE]").val(periodE.substr(5,2)+". "+periodE.substr(8,2));
	$("input[name=inputPeriodE]").val(periodE.substr(5,2)+". "+periodE.substr(8,2));
}
$("input[name=applyS], input[name=applyE], input[name=applyS], input[name=periodS], input[name=periodE]").on("change", function() {
	dataSync();
});
$("input[name=countLimit]").on("keyup", function() {
	var subCont = $('input[name="subTitle0[]"]').eq(1).val();
	var replaceTxt = subCont.substr(0,12);
	var indexOfEnd = subCont.indexOf(")");
	replaceTxt += $("input[name=countLimit]").val()+"명";
	replaceTxt += subCont.substr(indexOfEnd,subCont.length);
	$('input[name="subTitle0[]"]').eq(1).val(replaceTxt);
});
$('.timepicker').timepicker({
	timeFormat: 'H:mm',
	interval: 10,
	minTime: '08',
	maxTime: '23:00pm',
	defaultTime: 'value',
	startTime: '08:00',
	dynamic: false,
	dropdown: true,
	scrollbar: true
});
<? if (empty(element("explains_json", $membershipD))) { ?>
fnAddDefault();
<? } ?>
</script>

