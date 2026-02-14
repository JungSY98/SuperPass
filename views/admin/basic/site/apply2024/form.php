<style>
.bigTitle {
	background-color:#f4f4f4;
	text-align:center;
	vertical-align: middle !important;
	padding:7px 0px !important;
	height:100%;
}
</style>

<div class="box">
	<div class="box-table">

		<nav>
			<div class="nav nav-tabs" id="nav-tab-admin" role="tablist">
				<button class="nav-link active" id="nav-eval11-tab" data-bs-toggle="tab" data-bs-target="#nav-eval11" type="button" role="tab" aria-controls="nav-eval11" aria-selected="true">2. 신청서</button>
				<button class="nav-link" id="nav-eval22-tab" data-bs-toggle="tab" data-bs-target="#nav-eval22" type="button" role="tab" aria-controls="nav-eva22" aria-selected="false">3. 수행계획서</button>
				<button class="nav-link" id="nav-eval33-tab" data-bs-toggle="tab" data-bs-target="#nav-eval33" type="button" role="tab" aria-controls="nav-eval33" aria-selected="false">4. 산출내역서</button>
				<button class="nav-link" id="nav-eval44-tab" data-bs-toggle="tab" data-bs-target="#nav-eval44" type="button" role="tab" aria-controls="nav-eval44" aria-selected="false">5. 제출서류</button>
			</div>
		</nav>

		<div class="tab-content" id="nav-tabContent-admin">
			<!-- 과제평가 -->
			<div class="tab-pane fade pt-3 pb-3 active show " id="nav-eval11" role="tabpanel" aria-labelledby="nav-eval11-tab" tabindex="0">
				<?=$step2?>
			</div>
			<div class="tab-pane fade pt-3 pb-3" id="nav-eval22" role="tabpanel" aria-labelledby="nav-eval22-tab" tabindex="0">
				<?=$step3?>
			</div>
			<div class="tab-pane fade pt-3 pb-3" id="nav-eval33" role="tabpanel" aria-labelledby="nav-eval33-tab" tabindex="0">
				<?=$step4?>
			</div>
			<div class="tab-pane fade pt-3 pb-3" id="nav-eval44" role="tabpanel" aria-labelledby="nav-eval44-tab" tabindex="0">
				<?=$step5?>
			</div>
		</div>
	</div>
</div>

<!-- 서명 -->
<div class="modal fade" id="signatureModal" tabindex="-1" aria-labelledby="signatureModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="signatureModalLabel"><span></span>대표자 서명</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div id="signPlace" class="per100" style="width:440px;height:150px;border:1px solid #eee; border-radius:10px;"></div>

			</div>


			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">창닫기</button>
				<button type="button" class="btn btn-secondary" onclick="fnSignClear('signPlace')">서명 지우기</button>
				<button type="button" class="btn btn-danger" onclick="fnSignSave()">서명 저장</button>
			</div>
		</div>
	</div>
</div>

<!-- 우편번호 -->
<div id="daumAddressWrap" style="display:none;border:1px solid;width:50%;height:300px;margin:5px 0;position:fixed;top:calc(50% - 150px);left:25%;">
<img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnFoldWrap" style="cursor:pointer;position:absolute;right:0px;top:-1px;z-index:1" onclick="foldDaumPostcode()" alt="접기 버튼">
</div>



<!-- 파일업로드 -->
<div class="modal fade" id="uploadModal" aria-labelledby="uploadModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="uploadModalLabel"><span></span></h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="divUploadFileList" id="divUploadFileList">
				</div>
				<div id="uploadFile" class="w-100 text-center"></div>
				<div id="uploadPlace" class="w-100 align-middle text-center"></div>
			</div>


			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" onclick="location.reload()">창닫기</button>
			</div>
		</div>
	</div>
</div>

<link rel="stylesheet" href="/assets/plupload/jquery.plupload.queue/css/jquery.plupload.queue.css" type="text/css" media="screen" />
<!-- production -->
<script type="text/javascript" src="/assets/plupload/plupload.full.min.js"></script>
<script type="text/javascript" src="/assets/plupload/i18n/ko.js" charset="UTF-8"></script>
<script type="text/javascript" src="/assets/plupload/jquery.plupload.queue/jquery.plupload.queue.js"></script>
<script>
/* 전역 변수 선언 */
var isAllUploaded = false;
var isFileAdd = false;
var currentStep = 'step5';
var arrFileName = new Array();
<? foreach($document as $k => $docuName) { ?>
arrFileName['<?=$k?>'] = '<?=$docuName?>';
<? } ?>
var arrComType = new Array();
arrComType['com1'] = '중소기업';
arrComType['com2'] = '디자인전문기업';
$(document).ready(function() {

});

function fnViewFile(fileName, clientName) {
	location = "/viewFiles/"+fileName+"/";
}

function fnDelFile2(no) {
	if (confirm("정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다.")) {
		$.ajax({
			url: "/apply/ajaxDelUploadPhoto/",
			type: "POST",
			dataType: "html",
			data: {
				'no': no,
				'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			},
			success: function(data){
				$("#btnName"+no).remove();
			}
		});
	}
}

function fnGetFileList(docuType, comType) {
	$("#divUploadFileList").html("");
	$.ajax({
		url: "/apply/ajaxGetDocuList/",
		type: "POST",
		dataType: "html",
		data: {
			'applyNo': '<?=$applyNo?>',
			'docuType': docuType,
			'comType': comType,
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		},
		success: function(data){
			$("#divUploadFileList").html(data);
		}
	});
}

function fnUploadSave() {

}

function fnFileUpload(docuType, comType) {
	// 업로드 된 파일 가져오기
	fnGetFileList(docuType, comType);
	$("#uploadModalLabel").find("span").html("[ "+arrComType[comType]+" ]<br>"+arrFileName[docuType]+"  파일 첨부");
	fnCallFileUpload(docuType, comType);
	$("#uploadModal").modal("show");
}
function fnCallFileUpload(docuType, comType) {
	// Setup html5 version
	$("#uploadPlace").pluploadQueue({
		// General settings
		runtimes : 'html5',
		url : "/apply2023/upload",
		chunk_size : '1mb',
		unique_names : true,
		multipart_params: { 
			'applyNo' : '<?=$applyNo?>',
			'docuType' : docuType,
			'comType' : comType,
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		},
		filters : {
			prevent_duplicates : true,
			max_file_size : '100mb',
			mime_types: [
				{title : "Image files", extensions : "jpg,gif,png,JPG,jpeg,JPEG,GIF,PNG"},
				{title : "PDF files", extensions : "pdf,PDF"},
				{title : "Document files", extensions : "doc,docx,ppt,pptx,hwp,hwpx,xls,xlsx,DOC,DOCX,PPT,PPTX,HWP,HWPX,XLS,XLSX"},
				{title : "Zip files", extensions : "zip,ZIP"}
			]
		},
		init : {
			FilesAdded: function(up, files) {
				isAllUploaded = false;
				isFileAdd = true;
			},
			UploadComplete: function(up, files) {
                // Called when all files are either uploaded or failed
				fileVerify = new Array();
				plupload.each(files, function(file) {
					fileVerify.push(file);
				});
				isAllUploaded = true;
				isFileAdd = false;

				var upVerifyHtml = '';
				var arrUploadFiles = new Array();
				// 파일 DB 처리 
				for( var i = 0 ; i < fileVerify.length ; i++) {
					var clientName = fileVerify[i]['name'];
					var fileName = fileVerify[i]['target_name'];
					var fileData = JSON.stringify(fileVerify[i]);
					arrUploadFiles.push({"clientName":clientName, "fileName":fileName, "fileData":fileData});
				}
				$.ajax({
					url: "/apply2023/ajaxUploadFile/",
					type: "POST",
					dataType: "html",
					data: {
						'type': docuType+"_"+comType,
						'applyNo': '<?=$applyNo?>',
						'arrUploadFiles':arrUploadFiles,
						'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
					},
					success: function(data){
						fnGetFileList(docuType, comType);
						fnCallFileUpload(docuType, comType)
					}
				});
			}
		}
	});
	$("#uploadPlace_container").css("padding", "0px")
	$("div.plupload_header_content").css("display", "none");
	var chgTitle = setTimeout(function() {
		$("#uploadPlace_container").attr("title", arrFileName[docuType]+" 업로드");
	}, 100);
}

var signType = '';
var currentStep = 'step2';
$(document).ready(function() {
	$("#com1Name").on("change", function() {
		$("#signCom1Name").val($(this).val());
	});
	$("#com1RepresentName").on("change", function() {
		$("#signCom1Represent").val($(this).val());
	});
	$("#com2Name").on("change", function() {
		$("#signCom2Name").val($(this).val());
	});
	$("#com2RepresentName").on("change", function() {
		$("#signCom2Represent").val($(this).val());
	});
	$('#signPlace').signature(); 
	fnSetNumber();
});
function fnDoSign(type) {
	signType = type;
	if (type=='com1') {
		$("#signatureModalLabel").find("span").html("중소기업 ");
	} else {
		$("#signatureModalLabel").find("span").html("디자인기업 ");
	}
	$("#signatureModal").modal('show');
	$('#signPlace').signature(); 
	if ($("#"+type+"signData2").val()!='') {
		$('#signPlace').signature('enable').signature('draw', $("#"+type+"signData2").val())
	}
}
function fnSignSave() {

	if ($("#signPlace").signature('toSVG').length<700) {
		alert("서명이 작습니다. 다시 서명하여 주세요");
	}
	$("#"+signType+"signData1").val($("#signPlace").signature('toSVG'));
	$("#"+signType+"signData2").val($("#signPlace").signature('toJSON'));
	if ($("#"+signType+"signData1").val() == "" || $("#signPlace").signature('toSVG').length<700) {
		$("#btnSign_"+signType).removeClass("btn-success").addClass("btn-danger");
	} else {
		$("#btnSign_"+signType).removeClass("btn-danger").addClass("btn-success");
		$("#signatureModal").modal('hide');
	}
	
}
function fnSignClear(signID) {
	$("#"+signID).signature('clear'); 
	$("#"+signType+"signData1").val('');
	$("#"+signType+"signData2").val('');
}

</script>





	<button type="button" onclick="location = '/admin/site/apply2023/'; " class="btn btn-success w-100">지원 신청 저장 & 목록이동</button>


	</div>

</div>



<script>
function fnChkForm() {
	// 필수 사항 체크
	if (fnChkField("comName", "업체명을 입력하세요")==false) { return false; }
	if (fnChkField("ceoName", "대표자명을 입력하세요")==false) { return false; }
	if (fnChkField("comNo1", "사업자등록번호를 입력하세요")==false) { return false; }
	if (fnChkField("comNo2", "사업자등록번호를 입력하세요")==false) { return false; }
	if (fnChkField("comNo3", "사업자등록번호를 입력하세요")==false) { return false; }
	if (fnChkField("comType1", "사업자 업태를 입력하세요")==false) { return false; }
	if (fnChkField("comType2", "사업자 업종을 입력하세요")==false) { return false; }
	if (fnChkField("comAddr1", "사업자 소재지를 입력하세요")==false) { execDaumPostcode();  return false; }
	if (fnChkField("comAddr2", "사업자 소재지 상세주소를 입력하세요")==false) { return false; }
	if (fnChkField("comEmployee", "사업자 소재지 상세주소를 입력하세요")==false) { return false; }
	if (fnChkField("comEmployee", "사업자 소재지 상세주소를 입력하세요")==false) { return false; }
	//if (fnChkField("comTel1", "전화번호를 입력하세요")==false) { return false; }
	//if (fnChkField("comTel2", "전화번호를 입력하세요")==false) { return false; }
	//if (fnChkField("comTel3", "전화번호를 입력하세요")==false) { return false; }
	if (fnChkField("comPhone1", "휴대전화번호를 입력하세요")==false) { return false; }
	if (fnChkField("comPhone2", "휴대전화번호를 입력하세요")==false) { return false; }
	if (fnChkField("comPhone3", "휴대전화번호를 입력하세요")==false) { return false; }
	if (fnChkField("comEmail1", "이메일주소를 입력하세요")==false) { return false; }
	if (fnChkField("comEmail12", "이메일주소를 입력하세요")==false) { return false; }
	if (fnChkField("totalFund", "희망 사업비를 선택하세요")==false) { return false; }
}
function fnChkField(id, msg) {
	if ($("#"+id).val()=="") {
		$('html, body').stop().animate({scrollTop: $("#"+id).position().top}, 500);
		alert(msg);
		$("#"+id).focus();
		return false;
	} else {
		return true;
	}
}
function fnViewPolicy() {
	if ($(".contPrivacyPolicy").css('display')=='none') {
		$("#iconArrow").attr("src", "/assets/images/icon_arrow_up.png");
		$(".contPrivacyPolicy").slideDown();
	} else {
		$("#iconArrow").attr("src", "/assets/images/icon_arrow_down.png");
		$(".contPrivacyPolicy").slideUp();
	}
}
function fnViewTab(cate) {
	$("#tabApplyCategory li").find("a").removeClass("active");
	$("#tabApplyCategory li").each(function() {
		if ($(this).find("a").attr("aria-controls")==cate) $(this).find("a").addClass("active");
	});
	$(".tab-pane").removeClass("active");
	$("#"+cate).addClass("active");
}
$(document).ready(function() {
	$("input[name='apply[4][6]']").on("click", function() {
		if ($(this).is(":checked")==true) {
			$("div#efficientTab table.cateTable").append('<tr id="etcField"><td></td><td><textarea name="etcType" class="form-control" rows="3" placeholder="기타 희망 품목을 입력하세요" required></textarea></td></tr>');
		} else {
			$("#etcField").remove();
		}
	});
	fnViewTab('fireTab');
	$("#totalFund").on("change", function() {
		if ($(this).val()=="") {
			$("#supportFund").val("");
			$("#selfFund").val("");
			$("#vatFund").val("");
			$("#totalSelfFund").val("");
			$("input[name=supportFund]").val("");
			$("input[name=selfFund]").val("");
			$("input[name=vatFund]").val("");
			$("input[name=totalSelfFund]").val("");
		} else {
			s1Fund = parseInt($(this).val() * 0.9);
			s2Fund = parseInt($(this).val() * 0.1);
			vFund = parseInt($(this).val() * 0.1);
			tsFund = parseInt(s2Fund) + parseInt(vFund);
			$("#supportFund").val( number_format( String(s1Fund) ) );
			$("#selfFund").val( number_format( String(s2Fund) ) );
			$("#vatFund").val( number_format( String(vFund) ) );
			$("#totalSelfFund").val( number_format( String(tsFund) ) );
			$("input[name=supportFund]").val( s1Fund );
			$("input[name=selfFund]").val( s2Fund );
			$("input[name=vatFund]").val( vFund );
			$("input[name=totalSelfFund]").val( tsFund );
		}
	});
<? if (element('totalFund', $applyD)){ ?>
	$("#totalFund").val("<?=element('totalFund', $applyD)?>").prop("selected", true);
	var selectFund = <?=element('totalFund', $applyD)?>;
	s1Fund = parseInt(selectFund * 0.9);
	s2Fund = parseInt(selectFund * 0.1);
	vFund = parseInt(selectFund * 0.1);
	tsFund = parseInt(s2Fund) + parseInt(vFund);
	$("#supportFund").val( number_format( String(s1Fund) ) );
	$("#selfFund").val( number_format( String(s2Fund) ) );
	$("#vatFund").val( number_format( String(vFund) ) );
	$("#totalSelfFund").val( number_format( String(tsFund) ) );
	$("input[name=supportFund]").val( s1Fund );
	$("input[name=selfFund]").val( s2Fund );
	$("input[name=vatFund]").val( vFund );
	$("input[name=totalSelfFund]").val( tsFund );

<? } ?>
	$(document).on("click", function() {
		saveAll();
	});
	//setInterval(saveAll, 30000);
	fnSetNumber();
	$(".btnFinal").css("display", "none");
	$(".divContents.divApply").removeClass("mt-5");
	$(".divContents.divApply").removeClass("pt-5");
	$(".divContents").css("margin", "0px auto");
});

function saveAll() {
	var saveD = new Array();
	$(".divForm input").each(function() {
		//console.log($(this).attr("name")+ " _ "+$(this).attr("type")+' _ '+$(this).val()+" _ "+$(this).is(":checked"));
		if ($(this).attr("type")=='radio') {
			if ($(this).is(":checked")==true) {
				saveD.push({'type':$(this).attr("type"), 'name':$(this).attr("name"), 'val':$(this).val(), 'isChecked':$(this).is(":checked")});
			}
		} else {
			saveD.push({'type':$(this).attr("type"), 'name':$(this).attr("name"), 'val':$(this).val(), 'isChecked':$(this).is(":checked")});
		}
	});
	$(".divForm select").each(function() {
		saveD.push({'type':'select', 'name':$(this).attr("name"), 'val':$("select[name="+$(this).attr("name")+"] option:selected").val(), 'isChecked':true});
	});
	$(".divForm textarea").each(function() {
		saveD.push({'type':'textarea', 'name':$(this).attr("name"), 'val':$("textarea[name="+$(this).attr("name")+"]").val(), 'isChecked':true});
	});

	//saveD = JSON.stringify(saveD);
	//console.log(saveD);
/*
	$.ajax({
		url: "/apply/ajaxAutoSave/",
		type: "POST",
		dataType: "html",
		data: {
			'saveStep': 'step2',
			'saveD': saveD,
			'applyNo': '<?=$applyNo?>',
			'year': '2024',
			'times': '1',
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		},
		success: function(data){
			var result = $.parseJSON(data);
			if (result.stat == 'false') {
				alert(result.msg);
				location.reload();
			} else if (result.stat == 'debug') {
				console.log($.parseJSON(result.msg));
			}
		}
	});
*/
}

$("#menuTitle").html("접수 수정");
</script>
<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script>
    // 우편번호 찾기 찾기 화면을 넣을 element
    var element_wrap = document.getElementById('daumAddressWrap');

    function foldDaumPostcode() {
        // iframe을 넣은 element를 안보이게 한다.
        element_wrap.style.display = 'none';
    }

    function execDaumPostcode(comNo) {
        // 현재 scroll 위치를 저장해놓는다.
        var currentScroll = Math.max(document.body.scrollTop, document.documentElement.scrollTop);
        new daum.Postcode({
            oncomplete: function(data) {
                // 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var addr = ''; // 주소 변수
                var extraAddr = ''; // 참고항목 변수
                addr = data.roadAddress;

                // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
                if(data.userSelectedType === 'R'){
                    // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                    // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                    if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                        extraAddr += data.bname;
                    }
                    // 건물명이 있고, 공동주택일 경우 추가한다.
                    if(data.buildingName !== '' && data.apartment === 'Y'){
                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                    }
                    // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                    if(extraAddr !== ''){
                        extraAddr = ' (' + extraAddr + ')';
                    }
                    // 조합된 참고항목을 해당 필드에 넣는다.
                    document.getElementById(comNo+"Address3").value = extraAddr;
                
                } else {
                    document.getElementById(comNo+"Address3").value = '';
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById(comNo+"Zip").value = data.zonecode;
                document.getElementById(comNo+"Address1").value = addr;
                // 커서를 상세주소 필드로 이동한다.
                document.getElementById(comNo+"Address2").focus();

                // iframe을 넣은 element를 안보이게 한다.
                // (autoClose:false 기능을 이용한다면, 아래 코드를 제거해야 화면에서 사라지지 않는다.)
                element_wrap.style.display = 'none';

                // 우편번호 찾기 화면이 보이기 이전으로 scroll 위치를 되돌린다.
                document.body.scrollTop = currentScroll;
            },
            // 우편번호 찾기 화면 크기가 조정되었을때 실행할 코드를 작성하는 부분. iframe을 넣은 element의 높이값을 조정한다.
            onresize : function(size) {
                element_wrap.style.height = size.height+'px';
            },
            width : '100%',
            height : '100%'
        }).embed(element_wrap);

        // iframe을 넣은 element를 보이게 한다.
        element_wrap.style.display = 'block';
    }
</script>