<div class="card">
	<div class="card-header d-flex">
		<button class="btn btn-dark ms-auto" onclick="location = '/admin/brand/brandList/form/'; ">추가</button>
	</div>
	<div class="card-body">
		<div class="div-responsive">
			<table class="table table-hover">
				<thead>
				<tr>
					<th class="col-1 text-center">번호</th>
					<th class="col-5">기업명</th>
					<th>정보</th>
					<th class="col-2 text-center">담당자</th>
					<th class="col-1 text-center">관리</th>
				</tr>
				</thead>
				<tbody>
<? foreach($bizD as $k => $bD){ ?>
				<tr>
					<td class="col-1 text-center"><?=$bD['no']?></td>
					<td><span id="brandNameKR<?=$bD['no']?>"><?=$bD['bizNameKR']?></span><br><?=$bD['bizNameEN']?></td>
					<td>
<? if (element('bizTel', $bD)) { ?>
						<i class="fa fa-phone"></i> <?=$bD['bizTel']?> / 
<? } ?>
<? if (element('bizEmail', $bD)) { ?>
						<i class="fa fa-envelope"></i> <?=$bD['bizEmail']?> / 
<? } ?>
<? if (element('bWebsite', $bD)) { ?>
						<i class="fa fa-link"></i>  <?=$bD['bWebsite']?>
<? } ?>
						<br>
<? if (element('bSNS1', $bD)) { ?>
						<i class="fa fa-link"></i>  
						<?=$bD['bSNS1']?> / 
<? } ?>
<? if (element('bSNS2', $bD)) { ?>
						<i class="fa fa-link"></i>  
						<?=$bD['bSNS2']?> / 
<? } ?>
<? if (element('bSNS3', $bD)) { ?>
						<i class="fa fa-link"></i>  
						<?=$bD['bSNS3']?>
<? } ?>
					</td>
					<td class="text-center">
						<button class="btn btn-sm btn-dark w-100" onclick="return fnManage('<?=$bD['no']?>')"> 담당자 관리 (<?=$bD['cnt']?>)</button>
					</td>
					<td class="text-center">
						<div class="input-group w-100">
							<button class="btn btn-sm btn-success" onclick="location = '/admin/brand/brandList/form/<?=$bD['no']?>/'; ">수정</button>
							<button class="btn btn-sm btn-danger" onclick="return fnDelBrand('<?=$bD['no']?>')">삭제</button>
						</div>
					</td>
				</tr>
<? } ?>
				</tbody>
			</table>


	</div>
</div>




<div class="modal fade" id="workerModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable modal-fullscreen-lg-down">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="workLabel">담당자 관리</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body p-4">
				<div class="pt-3 pb-3" id="workerContents">

				</div>

				<div id="workerForm" class="pt-4">
					<hr style="border-top:2px solid green;opacity:1;">
					<div class="row">
						<div class="col-sm-2 align-middle">이름</div>
						<div class="col-sm-10"><input type="text" class="form-control" name="nName"></div>
					</div>
					<hr>
					<div class="row">
						<div class="col-sm-2 align-middle">아이디</div>
						<div class="col-sm-4"><input type="text" class="form-control" name="nID">
							<span class="text-danger fSize14" id="txtManagerID"></span>
						</div>
						<div class="col-sm-2 align-middle">비번 설정</div>
						<div class="col-sm-4"><input type="password" class="form-control" name="nPW"></div>
					</div>
					<hr>
					<div class="row">
						<div class="col-sm-2 align-middle">연락처</div>
						<div class="col-sm-4"><input type="tel" class="form-control" name="nPhone"></div>
						<div class="col-sm-2 align-middle">E-Mail</div>
						<div class="col-sm-4"><input type="email" class="form-control" name="nEmail"></div>
					</div>
					<hr>
					<button class="btn btn-success w-100" id="btnAddManager">담당자 추가</button>
					<button class="btn btn-dark w-100 d-none" id="btnModifyManager">담당자 수정</button>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">창닫기</button>
			</div>
		</div>
	</div>
</div>



<script>
var brandNo = '';
var modifyNo = '';
var isDup = false;
// 담당자 추가 처리
$("#btnAddManager").on("click", function() {
	if ($("input[name=nName]").val()=="") {
		alert("담당자 이름을 입력하세요");
		return false;
	}
	if ($("input[name=nID]").val()=="") {
		alert("담당자 ID를 입력하세요");
		return false;
	}
	if (isDup==false) {
		alert("담당자 ID를 다시 입력하세요");
		$("input[name=nID]").val('');
		return false;
	}
	if ($("input[name=nPW]").val()=="") {
		alert("담당자 비밀번호를 입력하세요");
		return false;
	}
	if ($("input[name=nPhone]").val()=="") {
		alert("담당자 연락처를 입력하세요");
		return false;
	}
	if ($("input[name=nEmail]").val()=="") {
		alert("담당자 이메일을 입력하세요");
		return false;
	}

	$.ajax({
		url: "/admin/brand/brandList/ajaxSaveManager/",
		type: "POST",
		dataType: "html",
		data: {
			'brandNo': brandNo,
			'managerName': $("input[name=nName]").val(),
			'managerEmail': $("input[name=nEmail]").val(),
			'managerPhone': $("input[name=nPhone]").val(),
			'managerID': $("input[name=nID]").val(),
			'managerPW': $("input[name=nPW]").val(),
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		},
		success: function(data){
			alert(data);
			location.reload();
		}
	});
});


// 담당자 수정 처리
$("#btnModifyManager").on("click", function() {
	if ($("input[name=nName]").val()=="") {
		alert("담당자 이름을 입력하세요");
		return false;
	}
	if ($("input[name=nEmail]").val()=="") {
		alert("담당자 이메일을 입력하세요");
		return false;
	}
	if ($("input[name=nPhone]").val()=="") {
		alert("담당자 연락처를 입력하세요");
		return false;
	}
	if ($("input[name=nID]").val()=="") {
		alert("담당자 ID를 입력하세요");
		return false;
	}

	$.ajax({
		url: "/admin/brand/brandList/ajaxModifyManager/",
		type: "POST",
		dataType: "html",
		data: {
			'modifyNo': modifyNo,
			'managerName': $("input[name=nName]").val(),
			'managerEmail': $("input[name=nEmail]").val(),
			'managerPhone': $("input[name=nPhone]").val(),
			'managerPW': $("input[name=nPW]").val(),
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		},
		success: function(data){
			//console.log(data);
			alert(data);
			location.reload();
		}
	});
});

function fnManage(no) {
	$("input[name=nName]").val('');
	$("input[name=nEmail]").val('');
	$("input[name=nPhone]").val('');
	$("input[name=nID]").val('');
	$("input[name=nPW]").val('');
	brandNo = no;
	$.ajax({
		url: "/admin/brand/brandList/ajaxGetBrandMember/",
		type: "POST",
		dataType: "html",
		data: {
			'no': no,
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		},
		success: function(data){
			var result = $.parseJSON(data);
			var html = '';
			for(var i=0 ; i<result.length ; i++) {
				html += '<div class="row" id="divManagerList_'+result[i].mem_id+'">';
				html += '<div class="col-sm-2">'+result[i].mem_userid+'</div>';
				html += '<div class="col-sm-4">'+result[i].mem_username+'</div>';
				html += '<div class="col-sm-4">'+result[i].mem_email+'<br>'+result[i].mem_phone+'</div>';
				html += '<div class="col-sm-2">';
				html += '<div class="input-group">';
				html += '<button type="button" class="btn btn-success" onclick="return fnEditManage('+result[i].mem_id+')"><i class="fa fa-edit"></i></button>';
				html += '<button type="button" class="btn btn-danger" onclick="return fnDelManage('+result[i].mem_id+')"><i class="fa fa-trash"></i></button>';
				html += '</div>';

				html += '</div>';
			}
			if (result.length==0) {
				html += '<div class="row"><div class="col-12 text-center">등록된 회원이 없습니다.</div></div>';
			}
			$("#workerContents").html(html);
			$("input[name=nName]").val( $("#brandNameKR"+no).html() );
			$("#workerModal").modal("show");
		}
	});
	
}



function fnEditManage(mNo) {
	$("#managerLabel2").html("담당자 수정");
	$("#btnAddManager").addClass("d-none");
	$("#btnModifyManager").removeClass("d-none");
	$("input[name=nID]").attr("disabled", true);
	modifyNo = mNo;
	$.ajax({
		url: "/admin/brand/brandList/ajaxGetManagerDetail/",
		type: "POST",
		dataType: "html",
		data: {
			'mNo': mNo,
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		},
		success: function(data){
			var result = $.parseJSON(data);
			$("input[name=nName]").val(result.mem_username);
			$("input[name=nEmail]").val(result.mem_email);
			$("input[name=nPhone]").val(result.mem_phone);
			$("input[name=nID]").val(result.mem_userid);
			$("input[name=nPW]").val('');
		}
	});
}

function fnDelManage(mNo) {
	if (confirm("한번 삭제한 자료는 복구할 수 없습니다.\n\n정말 삭제하시겠습니까?")) {
		$.ajax({
			url: "/admin/brand/brandList/ajaxDeleteManager/",
			type: "POST",
			dataType: "html",
			data: {
				'mNo': mNo,
				'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			},
			success: function(data){
				alert(data);
				$("#divManagerList_"+mNo).remove();
			}
		});
	}
}


function fnDelBrand(no) {
	if (confirm("정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다.")) {
		$.ajax({
			url: "/admin/brand/brandList/ajaxDelBrand/",
			type: "POST",
			dataType: "html",
			data: {
				'no': no,
				'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			},
			success: function(data){
				alert(data);
				location.reload();
			}
		});
	}
}




function fnCheckDupID(userID) {
	isDup = false;
	if (userID != '' && userID.length>=5) {
		$.ajax({
			url: "/admin/brand/brandList/ajaxCheckDup/",
			type: "POST",
			dataType: "html",
			data: {
				'userID': userID,
				'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			},
			success: function(data){
				$("#txtManagerID").html(data);
				if (data=='※ 사용가능한 아이디 입니다.') {
					$("#txtManagerID").removeClass("text-danger").addClass("text-success");
					isDup = true;
				} else {
					$("#txtManagerID").removeClass("text-success").addClass("text-danger");
				}
			}
		});
	} else {
		$("#txtManagerID").removeClass("text-success").addClass("text-danger")
		$("#txtManagerID").html("※ 5자 이상 입력하여 주세요");
	}
}



$(document).ready(function() {
	$("input[name=nID]").on("keyup", function() {
		fnCheckDupID($(this).val());
	});
});
</script>