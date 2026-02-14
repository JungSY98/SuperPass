<div class="container">

	<div class="card">
		<div class="card-header d-flex">
			<p class="me-auto m-0">Store List</p>
<? /* 
			<select name="year" class="form-control w-50" onchange="location = '/admin/store/storeList/?viewYear='+this.value; ">
				<option value="">연도를 선택하세요</option>
				<option value="2025" <?=$viewYear=='2025' ? "selected" : ""?>>2025</option>
			</select>
*/ ?>
<? if ($is_admin) { ?>
			<button class="btn btn-dark ms-auto " onclick="location = '/admin/store/storeList/form/'; ">추가</button>
<? } ?>
		</div>

		<div class="card-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="col-1 text-center">번호</th>
						<th class="col-2">이미지</th>
						<th class="col-5">Store 정보</th>
						<th class="text-center" style="width:105px;">관리</th>
					</tr>
				</thead>
				<tbody>
<? foreach($storeD as $k => $sD) {
	$couponD = $this->site->selectCI("coupon_no", "coupon", array("store_no"=>$sD['no']), "coupon_no desc");
	$couponCnt = count($couponD);
?>
					<tr>
						<td class="text-center"><?=$sD['no']?></td>
						<td></td>
						<td>
							<p class="m-0 badge bg-primary"><?=$sD['category']?></p><br>
							<?=$sD['sNameKR']?> / <?=$sD['sNameEN']?><br>
							<?=$sD['sAddr1KR']?> <?=$sD['sAddr2KR']?><hr style="margin:5px 0px;">
							<?=$sD['mapLat']?> / <?=$sD['mapLng']?>
						</td>
						<td>
							<?=$sD['isStamp']=='Y'?'<span class="badge bg-primary">Stamp</span><br>':''?>
							<span class="badge bg-success">사용여부 : <?=$sD['isUse']?></span>
							<span class="badge bg-success">쿠폰 수 : <?=$couponCnt?></span>
						</td>
						<td>
							<div class="btn-group w-100">
<? if ($is_admin) { ?>
								<button class="btn btn-outline-dark" onclick="return fnSetMemberLink('<?=$sD['no']?>')">회원 설정</button>
<? } ?>
								<a href="/admin/store/couponList/store/<?=$sD['no']?>" class="btn btn-outline-success">쿠폰관리</a>
								<button class="btn btn-sm btn-success" onclick="location = '/admin/store/storeList/form/<?=$sD['no']?>/'; ">수정</button>
<? if ($is_admin) { ?>
								<button class="btn btn-sm btn-danger" onclick="return fnDelSpot('<?=$sD['no']?>')">삭제</button>
<? } ?>
							</div>
						</td>
					</tr>
<? } ?>
				</tbody>
			</table>
		</div>
	</div>

</div>



<!-- Modal -->
<div class="modal fade" id="comMemLinkModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="comMemLinkModalLabel">회원 연결</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<select name="members" class="multi-select form-control" style="width:100%;height:300px;" multiple='multiple'>
			<option value="" disabled>선택하세요</option>
<? foreach($memberD as $k => $mD) {?>
			<option value="<?=$mD['mem_id']?>"><?=$mD['mem_userid']?> _ <?=$mD['mem_username']?></option>
<? } ?>
		</select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">창닫기</button>
      </div>
    </div>
  </div>
</div>


<script>
function fnDelSpot (no) {
	if (confirm("정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다.")) {
		$.ajax({
			url: "/admin/store/storeList/ajaxDelStore/",
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
</script>
<link href="/assets/css/multi-select.css" rel="stylesheet" type="text/css"/>
<script type='text/javascript' src='/assets/js/jquery.multi-select.js'></script>
<script type='text/javascript' src='/assets/js/jquery.quicksearch.js'></script>
<script>
$("#comMemLinkModal").on("hidden.bs.modal", function() {
	noAction = true;
	$('.multi-select').multiSelect('deselect_all');
	noAction = false;
});
var noAction = false;
var viewComNo;
function fnSetMemberLink(no) {
	viewComNo = no;
	$.ajax({
		url: "/admin/store/storeList/ajaxGetMatch/",
		type: "POST",
		dataType: "html",
		data: {
			storeNo:no,
			'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
		},
		success: function(data){
			//console.log(data);
			data = $.parseJSON(data);
			var sData = new Array();
			if (data) {
				for(var i=0;i<data.length;i++) { 
					sData.push(data[i].memNo);
				}
				$.each(sData, function(i,e){
					$("select[name=members] option[value='" + e + "']").prop("selected", true);
				});
			}
			$('.multi-select').multiSelect({
				selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='Search from All List'>",
				selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='Search from Selected List'>",
				afterInit: function (ms) {
					var that = this,
						$selectableSearch = that.$selectableUl.prev(),
						$selectionSearch = that.$selectionUl.prev(),
						selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
						selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

					that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
						.on('keydown', function (e) {
							if (e.which === 40) {
								that.$selectableUl.focus();
								return false;
							}
						});

					that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
						.on('keydown', function (e) {
							if (e.which == 40) {
								that.$selectionUl.focus();
								return false;
							}
						});
				},
				afterSelect: function (values) {
					return fnManageSelect("selected", values)
					this.qs1.cache();
					this.qs2.cache();
				},
				afterDeselect: function (values) {
					if (noAction==false) fnManageSelect("deselected", values)
					this.qs1.cache();
					this.qs2.cache();
				}
			});

			$("#comMemLinkModal").modal('show');

		}
	});

}

function fnManageSelect(action, mNo) {
	//console.log(mNo);
	$.ajax({
		url: "/admin/store/storeList/ajaxSetMatch/",
		type: "POST",
		dataType: "html",
		data: {
			storeNo:viewComNo,
			action:action,
			mNo:mNo,
			selectedNo:$("select[name=members]").val(),
			'<?=$this->security->get_csrf_token_name()?>' : '<?=$this->security->get_csrf_hash()?>'
		},
		success: function(data){
			console.log(data);
			if (data=='이미 등록된 아이디 입니다.') {
				noAction = true;
				$("select[name=members]").multiSelect('deselect', mNo);
				noAction = false;
			}
			alert(data);
		}
	});
}
function fnSaveLink() {

}
</script>